require("dotenv").config();
const express = require("express");
const cors = require("cors");
const axios = require("axios");

const app = express();
app.use(cors());
app.use(express.json());

const API_KEY = process.env.GEMINI_API_KEY;
const API_URL = `https://generativelanguage.googleapis.com/v1/models/gemini-2.0-flash:generateContent?key=${API_KEY}`;

app.post("/generate", async (req, res) => {
    try {
        const { prompt } = req.body;
        console.log("Received prompt:", prompt); // Debugging

        const response = await axios.post(API_URL, {
            contents: [{ parts: [{ text: prompt }] }]
        });

        console.log("API Response:", response.data); // Debugging
        res.json({ result: response.data.candidates[0].content.parts[0].text });
    } catch (error) {
        console.error("Error:", error.response?.data || error.message);
        res.status(500).json({ error: error.response?.data || error.message });
    }
});

const PORT = 5000;
app.listen(PORT, () => console.log(`Server running on port ${PORT}`));