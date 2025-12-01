#!/bin/bash

# AI Assistant Flask Server Startup Script
# This script starts the Flask server for the AI Assistant

echo "=== AI Assistant Flask Server ==="
echo ""

# Check if Python is installed
if ! command -v python3 &> /dev/null; then
    echo "Error: Python 3 is not installed"
    exit 1
fi

# Navigate to AI assistant directory
cd "$(dirname "$0")"

# Check if .env.ai exists
if [ ! -f ".env.ai" ]; then
    echo "Error: .env.ai file not found"
    echo "Please create .env.ai with your GEMINI_API_KEY"
    exit 1
fi

# Check if requirements are installed
echo "Checking dependencies..."
python3 -c "import flask, google.generativeai, PyPDF2, markdown, dotenv" 2>/dev/null
if [ $? -ne 0 ]; then
    echo ""
    echo "Missing dependencies. Please install them:"
    echo ""
    echo "Option 1 - Using virtual environment (recommended):"
    echo "  sudo apt install python3-venv"
    echo "  python3 -m venv venv"
    echo "  source venv/bin/activate"
    echo "  pip install -r requirements.txt"
    echo ""
    echo "Option 2 - System-wide installation:"
    echo "  sudo apt install python3-pip"
    echo "  pip3 install --user -r requirements.txt"
    echo ""
    exit 1
fi

# Start Flask server
echo "Starting Flask server on port 5001..."
echo "Press Ctrl+C to stop"
echo ""

python3 rag_code.py
