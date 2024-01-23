const express = require('express');
const mysql = require('mysql');
const bodyParser = require('body-parser');

const app = express();
const port = 3000;

// Create a MySQL connection
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'bnb_db'
});

// Connect to the database
connection.connect((err) => {
    if (err) {
        console.error('Error connecting to MySQL:', err);
        return;
    }
    console.log('Connected to MySQL');
});

// Middleware to parse JSON and form data in the request body
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

// Handle form submission
app.post('/submit', (req, res) => {
    // Get form data from the request body
    const { username, password, email } = req.body;

    // Insert data into the database
    const sql = 'INSERT INTO users (username, password, email) VALUES (?, ?, ?)';
    connection.query(sql, [username, password, email], (err, result) => {
        if (err) {
            console.error('Error inserting data:', err);
            res.status(500).json({ message: 'Error inserting data' });
            return;
        }

        console.log('Data inserted successfully');
        res.json({ message: 'Data inserted successfully' });
    });
});

// Start the server
app.listen(port, () => {
    console.log(`Server is running on port ${port}`);
});
