import React from 'react';
import { useState } from 'react';
import Header from '../component/Header';
import SidebarUser from '../component/SidebarUser';

const RoomCard = ({ room }) => {

    const [showModal, setShowModal] = useState(false);
    const [startDate, setStartDate] = useState('');
    const [endDate, setEndDate] = useState('');
    const [purpose, setPurpose] = useState('');

    const handleBooking = () => {
        setShowModal(true);
    };

    const closeModal = () => {
        setShowModal(false);
    };

    const handleSubmit = () => {
        console.log('Booking submitted:', { startDate, endDate, purpose });
        setShowModal(false);
    };

    return (
        <div className="bg-white rounded-md p-4 shadow-md mb-4">
            <div className="flex items-center justify-between mb-3">
                <h4 className="text-lg font-semibold text-black">{room.roomName}</h4>
            </div>
            <p className="text-gray-600 mb-2">Location: {room.location}</p>
            <p className="text-gray-600 mb-2">Capacity: {room.capacity} people</p>
            <img
                src={`https://via.placeholder.com/200x150?text=${room.picture}`}
                alt={`${room.roomName} Picture`}
                className="w-full h-auto rounded-md"
            />
            <button onClick={handleBooking} className='mt-5 bg-blue-500 text-white px-4 py-2 rounded-md'>Booking Now</button>

            {showModal && (
                <div className="fixed inset-0 flex items-center justify-center">
                    <div className="absolute inset-0 bg-gray-800 opacity-75"></div>
                    <div className="bg-white p-8 rounded-md z-10">
                        <h2 className="text-2xl font-semibold mb-4 text-black">{room.roomName}</h2>
                        <p className="text-gray-600 mb-4">Location: {room.location}</p>
                        <p className="text-gray-600 mb-4">Capacity: {room.capacity} people</p>

                        <label htmlFor="startDate" className="block text-black text-sm font-bold mb-2 w-96">
                            Start Date and Time:
                        </label>
                        <input
                            type="datetime-local"
                            id="startDate"
                            value={startDate}
                            onChange={(e) => setStartDate(e.target.value)}
                            className="border rounded-md px-3 py-2 mb-2 text-black"
                        />

                        <label htmlFor="endDate" className="block text-black text-sm font-bold mb-2">
                            End Date and Time:
                        </label>
                        <input
                            type="datetime-local"
                            id="endDate"
                            value={endDate}
                            onChange={(e) => setEndDate(e.target.value)}
                            className="border rounded-md px-3 py-2 mb-2 text-black"
                        />

                        <label htmlFor="purpose" className="block text-black text-sm font-bold mb-2">
                            Purpose:
                        </label>
                        <textarea
                            id="purpose"
                            value={purpose}
                            onChange={(e) => setPurpose(e.target.value)}
                            className="border rounded-md px-3 py-2 mb-4 w-full text-black"
                            rows="4"
                        ></textarea>

                        <div className="flex justify-end">
                            <button onClick={closeModal} className='bg-gray-500 text-white px-4 py-2 rounded-md mr-2'>Close</button>
                            <button onClick={handleSubmit} className='bg-blue-500 text-white px-4 py-2 rounded-md'>Submit</button>
                        </div>
                    </div>
                </div>
            )}
        </div>
    );
};

const RoomList = () => {
    const [openSidebarToggle, setOpenSidebarToggle] = useState(false);

    const OpenSidebar = () => {
        setOpenSidebarToggle(!openSidebarToggle);
    };

    const bookingData = [
        { id: 1, roomName: 'Meeting Room A', location: 'Lantai 2', capacity: '10', picture: 'A' },
        { id: 2, roomName: 'Meeting Room B', location: 'Lantai 4', capacity: '15', picture: 'B' },
        { id: 3, roomName: 'Meeting Room C', location: 'Lantai 5', capacity: '20', picture: 'C' },
        { id: 4, roomName: 'Meeting Room D', location: 'Lantai 1', capacity: '15', picture: 'D' },
        { id: 5, roomName: 'Meeting Room E', location: 'Lantai 3', capacity: '5', picture: 'E' },
        { id: 6, roomName: 'Meeting Room F', location: 'Lantai 2', capacity: '8', picture: 'F' },
    ];

    return (
        <>
            <Header OpenSidebar={OpenSidebar} />
            <SidebarUser openSidebarToggle={openSidebarToggle} OpenSidebar={OpenSidebar} />
            <main className='main-container p-4 sm:p-8'>
                <div className="main-title mb-4">
                    <h3 className="text-lg sm:text-xl font-bold">LIST ROOM</h3>
                </div>

                <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    {bookingData.map((room) => (
                        <RoomCard key={room.id} room={room} />
                    ))}
                </div>
            </main>
        </>
    );
};

export default RoomList;
