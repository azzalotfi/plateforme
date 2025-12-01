import os
import google.generativeai as genai
from flask import Flask, request, jsonify, session
from flask_session import Session
from flask_cors import CORS
import markdown
from PyPDF2 import PdfReader
from dotenv import load_dotenv

# Load environment variables
load_dotenv('.env.ai')

# Configure the Flask app
app = Flask(__name__)
app.config["SESSION_TYPE"] = "filesystem"
app.secret_key = os.getenv('FLASK_SECRET_KEY', os.urandom(24))

# Enable CORS for Symfony communication
CORS(app, resources={r"/api/*": {"origins": "*"}})

Session(app)

# Configure Google Gemini API
GEMINI_API_KEY = os.getenv('GEMINI_API_KEY')
if not GEMINI_API_KEY:
    raise ValueError("GEMINI_API_KEY not set in .env.ai file")

genai.configure(api_key=GEMINI_API_KEY)

generation_config = {
    "temperature": 0.5,   # factual only
    "top_p": 0.9,
    "max_output_tokens": 512
}

# System instruction adapted to services PDF
system_instruction = """
You are ServiceBot, an assistant that answers ONLY using the information found in the provided PDF.
The PDF contains lists of services (électricité, plomberie, menuiserie, etc.) and professionals (names, phone numbers, cities).

RULES:
- You MUST answer strictly and only using data from the PDF.
- If the user asks about anything outside the PDF, answer ONLY:
  "The information is not available."
- Do NOT invent information.
- Do NOT guess.
- Do NOT answer questions unrelated to the PDF except greetings and things like that.
"""

model = genai.GenerativeModel(
    "gemini-2.5-flash",
    generation_config=generation_config,
    system_instruction=system_instruction
)

# Load PDF
PDF_FILE_PATH = os.path.join(os.path.dirname(__file__), "data", "services.pdf")

policy_content = ""

if os.path.exists(PDF_FILE_PATH):
    reader = PdfReader(PDF_FILE_PATH)
    policy_content = " ".join([page.extract_text() for page in reader.pages if page.extract_text()])
else:
    raise FileNotFoundError(f"PDF file not found at {PDF_FILE_PATH}")

@app.route('/api/chat', methods=['POST'])
def api_chat():
    """API endpoint for Symfony to send chat messages"""
    try:
        data = request.get_json()
        user_message = data.get('message', '')
        
        if not user_message:
            return jsonify({'error': 'No message provided'}), 400

        # Create prompt with PDF context
        prompt = f"""
=== SERVICES DOCUMENT (from PDF) ===
{policy_content}

=== USER QUESTION ===
{user_message}

=== INSTRUCTIONS ===
- Respond ONLY using the services and professional data from the PDF.
- No external knowledge is allowed.
- If information is not present in the PDF, reply:
  "The information is not available in the provided document."
- If the information is present in the document try to generate a good response containing the informations that the user may need
"""

        try:
            response = model.generate_content(prompt).text.strip()
        except Exception as e:
            return jsonify({'error': f'Error generating response: {str(e)}'}), 500

        # Convert markdown to HTML
        ai_response_html = markdown.markdown(response)
        
        return jsonify({
            'success': True,
            'response': ai_response_html,
            'response_text': response
        })
        
    except Exception as e:
        return jsonify({'error': str(e)}), 500

@app.route('/health', methods=['GET'])
def health():
    """Health check endpoint"""
    return jsonify({'status': 'ok', 'service': 'AI Assistant'})

if __name__ == "__main__":
    port = int(os.getenv('FLASK_PORT', 5001))
    app.run(debug=True, port=port, host='0.0.0.0')
