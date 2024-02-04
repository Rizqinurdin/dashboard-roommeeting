import React from 'react';
import { useState } from 'react';
import Header from '../component/Header';
import SidebarUser from '../component/SidebarUser';

const Dashboard = () => {
    const [openSidebarToggle, setOpenSidebarToggle] = useState(false);

    const OpenSidebar = () => {
        setOpenSidebarToggle(!openSidebarToggle);
    };

    return (
        <>
            <Header OpenSidebar={OpenSidebar} />
            <SidebarUser openSidebarToggle={openSidebarToggle} OpenSidebar={OpenSidebar} />
            <main className='main-container p-4 sm:p-8 bg-gray-100'>
                <div className="main-title mb-4">
                    <h3 className="text-lg sm:text-xl font-bold text-blue-600">Welcome to Meeting Room Booking</h3>
                </div>

                <div className="welcome-content bg-white p-6 rounded-lg shadow-md animate-fade-in">
                    <p className="text-gray-700">
                        Plan your meetings with ease! Whether it's a brainstorming session,
                        a client presentation, or a team collaboration, our meeting room booking
                        system is here to simplify the process for you.
                    </p>
                    <p className="text-gray-700">
                        Navigate through the sidebar to explore available features, and reserve
                        your preferred meeting room hassle-free. Keep track of your upcoming
                        reservations and receive timely notifications.
                    </p>

                    <div className="mt-6">
                        <img
                            src="https://via.placeholder.com/400"
                            alt="Placeholder Image"
                            className="w-full h-auto rounded-md animate-fade-in"
                        />
                    </div>
                </div>
            </main>
        </>
    );
};

export default Dashboard;
