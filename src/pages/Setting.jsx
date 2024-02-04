import React, { useState } from 'react';
import Header from '../component/Header';
import Sidebar from '../component/Sidebar';

const Setting = () => {

    const [openSidebarToggle, setOpenSidebarToggle] = useState(false);

    const OpenSidebar = () => {
        setOpenSidebarToggle(!openSidebarToggle);
    };

    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [confirmPassword, setConfirmPassword] = useState('');

    return (
        <>
            <Header OpenSidebar={OpenSidebar} />
            <Sidebar openSidebarToggle={openSidebarToggle} OpenSidebar={OpenSidebar} />
            <main className='main-container p-4 sm:p-8'>
                <div className="main-title mb-4">
                    <h3 className="text-lg sm:text-xl font-bold">SETTINGS</h3>
                </div>

                <div className="flex flex-col space-y-4">
                    <div>
                        <label htmlFor="email" className="block text-sm font-medium text-white-700">
                            Email
                        </label>
                        <input
                            type="email"
                            id="email"
                            className="mt-1 p-2 border border-gray-500 rounded-md w-80 focus:outline-none focus:ring focus:border-blue-500 text-black"
                            placeholder="example@mail.com"
                            value={email}
                            onChange={(e) => setEmail(e.target.value)}
                        />
                    </div>

                    <div>
                        <label htmlFor="password" className="block text-sm font-medium text-white-700">
                            Password
                        </label>
                        <input
                            type="password"
                            id="password"
                            className="mt-1 p-2 border border-gray-300 rounded-md w-80 focus:outline-none focus:ring focus:border-blue-500 text-black"
                            placeholder="Enter your password"
                            value={password}
                            onChange={(e) => setPassword(e.target.value)}
                        />
                    </div>

                    <div>
                        <label htmlFor="confirmPassword" className="block text-sm font-medium text-white-700">
                            Confirm Password
                        </label>
                        <input
                            type="password"
                            id="confirmPassword"
                            className="mt-1 p-2 border border-gray-300 rounded-md w-80 focus:outline-none focus:ring focus:border-blue-500 text-black"
                            placeholder="Confirm your password"
                            value={confirmPassword}
                            onChange={(e) => setConfirmPassword(e.target.value)}
                        />
                    </div>
                </div>
                <button className='mt-5 bg-blue-500 text-white px-4 py-2 rounded-md'>Submit</button>
            </main>
        </>
    );
};

export default Setting;
