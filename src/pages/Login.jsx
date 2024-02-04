// Login.js
import React, { useState } from 'react';

const Login = () => {
    const [username, setUsername] = useState('');
    const [password, setPassword] = useState('');

    const handleLogin = () => {
        // Logika login dapat ditambahkan di sini
        console.log(`Username: ${username}, Password: ${password}`);
    };

    return (
        <div className="flex items-center justify-center h-screen">
            <div className="login-container">
                <h2 className="text-2xl font-semibold mb-4">Login</h2>
                <form className="flex flex-col">
                    <div className="input-group mb-4">
                        <label htmlFor="username" className="text-sm font-semibold text-gray-700">Username:</label>
                        <input
                            type="text"
                            id="username"
                            value={username}
                            onChange={(e) => setUsername(e.target.value)}
                            className="border p-2 rounded-md"
                        />
                    </div>
                    <div className="input-group mb-4">
                        <label htmlFor="password" className="text-sm font-semibold text-gray-700">Password:</label>
                        <input
                            type="password"
                            id="password"
                            value={password}
                            onChange={(e) => setPassword(e.target.value)}
                            className="border p-2 rounded-md"
                        />
                    </div>
                    <button type="button" onClick={handleLogin} className="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                        Login
                    </button>
                </form>
            </div>
        </div>
    );
};

export default Login;
