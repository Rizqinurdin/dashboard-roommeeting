import React from 'react';
import { useState } from 'react';
import { BsFillArchiveFill, BsFillGrid3X3GapFill, BsPeopleFill, BsBellFill } from 'react-icons/bs';
import { FaHourglass, FaCheckCircle, FaTimesCircle } from 'react-icons/fa';
import Header from './component/Header';
import Sidebar from './component/Sidebar';




const Home = () => {

    const [openSidebarToggle, setOpenSidebarToggle] = useState(false);

    const OpenSidebar = () => {
        setOpenSidebarToggle(!openSidebarToggle);
    };

    const bookingData = [
        { id: 1, user: 'John Doe', department: 'IT', room: 'Room A', startDateTime: '2024-01-24 09:00', endDateTime: '2024-01-24 10:00', purpose: 'Team Meeting', status: 'Approved' },
        { id: 2, user: 'Jane Doe', department: 'HR', room: 'Room B', startDateTime: '2024-01-25 13:30', endDateTime: '2024-01-25 14:30', purpose: 'Interview', status: 'Pending' },
        { id: 3, user: 'Alice Smith', department: 'Sales', room: 'Room C', startDateTime: '2024-01-26 10:00', endDateTime: '2024-01-26 11:30', purpose: 'Client Presentation', status: 'Approved' }

    ];

    return (
        <>
            <Header OpenSidebar={OpenSidebar} />
            <Sidebar openSidebarToggle={openSidebarToggle} OpenSidebar={OpenSidebar} />
            <main className='main-container p-4 sm:p-8'>
                <div className="main-title mb-4">
                    <h3 className="text-lg sm:text-xl font-bold">DASHBOARD</h3>
                </div>
                <div className='main-cards grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4'>
                    <div className='card bg-white p-4 rounded-md shadow-md'>
                        <div className='card-inner flex items-center justify-between mb-4'>
                            <h3 className='text-base sm:text-lg font-semibold'>Total Meeting Room</h3>
                            <BsFillArchiveFill className='card_icon' />
                        </div>
                        <h1 className='text-2xl sm:text-3xl font-bold'>5</h1>
                    </div>
                    <div className='card bg-white p-4 rounded-md shadow-md'>
                        <div className='card-inner flex items-center justify-between mb-4'>
                            <h3 className='text-base sm:text-lg font-semibold'>Total User</h3>
                            <BsFillGrid3X3GapFill className='card_icon' />
                        </div>
                        <h1 className='text-2xl sm:text-3xl font-bold'>12</h1>
                    </div>
                    <div className='card bg-white p-4 rounded-md shadow-md'>
                        <div className='card-inner flex items-center justify-between mb-4'>
                            <h3 className='text-base sm:text-lg font-semibold'>Available Room</h3>
                            <BsPeopleFill className='card_icon' />
                        </div>
                        <h1 className='text-2xl sm:text-3xl font-bold'>5</h1>
                    </div>
                    <div className='card bg-white p-4 rounded-md shadow-md'>
                        <div className='card-inner flex items-center justify-between mb-4'>
                            <h3 className='text-base sm:text-lg font-semibold'>Already Booked</h3>
                            <BsBellFill className='card_icon' />
                        </div>
                        <h1 className='text-2xl sm:text-3xl font-bold'>0</h1>
                    </div>
                    <div className='card bg-white p-4 rounded-md shadow-md'>
                        <div className='card-inner flex items-center justify-between mb-4'>
                            <h3 className='text-base sm:text-lg font-semibold'>Pending</h3>
                            <FaHourglass className='card_icon' />
                        </div>
                        <h1 className='text-2xl sm:text-3xl font-bold'>0</h1>
                    </div>
                    <div className='card bg-white p-4 rounded-md shadow-md'>
                        <div className='card-inner flex items-center justify-between mb-4'>
                            <h3 className='text-base sm:text-lg font-semibold'>Approved</h3>
                            <FaCheckCircle className='card_icon' />
                        </div>
                        <h1 className='text-2xl sm:text-3xl font-bold'>2</h1>
                    </div>
                    <div className='card bg-white p-4 rounded-md shadow-md'>
                        <div className='card-inner flex items-center justify-between mb-4'>
                            <h3 className='text-base sm:text-lg font-semibold'>Rejected</h3>
                            <FaTimesCircle className='card_icon' />
                        </div>
                        <h1 className='text-2xl sm:text-3xl font-bold'>4</h1>
                    </div>
                </div>

                <div className="booking-table mt-8">
                    <h3 className="text-lg sm:text-xl font-bold mb-4 text-center">Booking Information</h3>
                    <div className="overflow-x-auto">
                        <table className="table-auto min-w-full sm:min-w-0 md:min-w-full border-collapse border border-gray-500">
                            <thead>
                                <tr>
                                    <th className="border border-gray-500 p-2">ID Booking</th>
                                    <th className="border border-gray-500 p-2">User</th>
                                    <th className="border border-gray-500 p-2">Departement</th>
                                    <th className="border border-gray-500 p-2">Meeting Room</th>
                                    <th className="border border-gray-500 p-2">Start Date Time</th>
                                    <th className="border border-gray-500 p-2">End Date Time</th>
                                    <th className="border border-gray-500 p-2">Purpose</th>
                                    <th className="border border-gray-500 p-2">Status</th>
                                </tr>
                            </thead>
                            <tbody className='text-center'>
                                {bookingData.map((booking) => (
                                    <tr key={booking.id}>
                                        <td className="border border-gray-500 p-2">{booking.id}</td>
                                        <td className="border border-gray-500 p-2">{booking.user}</td>
                                        <td className="border border-gray-500 p-2">{booking.department}</td>
                                        <td className="border border-gray-500 p-2">{booking.room}</td>
                                        <td className="border border-gray-500 p-2">{booking.startDateTime}</td>
                                        <td className="border border-gray-500 p-2">{booking.endDateTime}</td>
                                        <td className="border border-gray-500 p-2">{booking.purpose}</td>
                                        <td className="border border-gray-500 p-2">{booking.status}</td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                </div>



            </main>
        </>
    );
};

export default Home;
