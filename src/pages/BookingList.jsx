import React from 'react';
import { useState } from 'react';
import Header from '../component/Header';
import Sidebar from '../component/Sidebar';

const BookingList = () => {

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
                    <h3 className="text-lg sm:text-xl font-bold">BOOKING LIST</h3>
                </div>
                <div className="booking-table mt-8">
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
                                    <th className="border border-gray-500 p-2">Action</th>
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
                                        <td className="border border-gray-500 p-2">
                                            <button className='mt-5 bg-blue-500 text-white px-4 py-2 rounded-md'>Approved</button>
                                            <button className='mt-5 bg-red-500 text-white px-4 py-2 rounded-md'>Rejected</button>
                                        </td>
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

export default BookingList;
