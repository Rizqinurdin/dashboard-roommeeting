import React from 'react';
import { useState } from 'react';
import { FaInfoCircle, FaEdit, FaTrash } from 'react-icons/fa';
import Header from '../component/Header';
import Sidebar from '../component/Sidebar';

const ListRoom = () => {
    const [openSidebarToggle, setOpenSidebarToggle] = useState(false);
    const [isModalOpen, setIsModalOpen] = useState(false);
    const [newRoomData, setNewRoomData] = useState({
        roomName: '',
        location: '',
        capacity: '',
        picture: '',
    });

    const [isModalEdit, setIsModalEdit] = useState(false);
    const [editRoomData, setEditRoomData] = useState({
        roomName: '',
        location: '',
        capacity: '',
        picture: '',
    });


    const OpenSidebar = () => {
        setOpenSidebarToggle(!openSidebarToggle);
    };

    const openModal = () => {
        setIsModalOpen(true);
    };

    const closeModal = () => {
        setIsModalOpen(false);
        setNewRoomData({
            roomName: '',
            location: '',
            capacity: '',
            picture: '',
        });
    }

    const editModal = () => {
        setIsModalEdit(true);
    };

    const closeEditModal = () => {
        setIsModalEdit(false);
        setEditRoomData({
            roomName: '',
            location: '',
            capacity: '',
            picture: '',
        });
    };
    const handleInputChange = (e) => {
        const { name, value } = e.target;
        setNewRoomData((prevData) => ({
            ...prevData,
            [name]: value,
        }));
    };

    const handleFileInputChange = (e) => {
        const file = e.target.files[0];

        if (file) {
            // Assuming you want to store the file object in the state
            setNewRoomData((prevData) => ({
                ...prevData,
                picture: file,
            }));
        }
    };

    const handleEditInputChange = (e) => {
        const { name, value } = e.target;
        setEditRoomData((prevData) => ({
            ...prevData,
            [name]: value,
        }));
    };

    const handleEditFileInputChange = (e) => {
        const file = e.target.files[0];

        if (file) {
            setEditRoomData((prevData) => ({
                ...prevData,
                picture: file,
            }));
        }
    };

    const handleAddRoom = () => {
        // Add the new room data to your existing bookingData
        // This is just a sample, you may want to handle this differently
        const newBookingData = [...bookingData, { id: bookingData.length + 1, ...newRoomData }];
        // Update the bookingData with the new data
        setBookingData(newBookingData);
        // Close the modal
        closeModal();
    };

    const handleEditRoom = () => {
        // Add logic for editing the room data
        // Update the bookingData with the edited data
        // Close the modal
        closeEditModal();
    };

    const bookingData = [
        { id: 1, roomName: 'Meeting Room A', location: 'Lantai 2', capacity: '10', picture: 'DummyData' },
        { id: 2, roomName: 'Meeting Room B', location: 'Lantai 4', capacity: '15', picture: 'DummyData' },
        { id: 3, roomName: 'Meeting Room C', location: 'Lantai 5', capacity: '20', picture: 'DummyData' },
    ];

    return (
        <>
            <Header OpenSidebar={OpenSidebar} />
            <Sidebar openSidebarToggle={openSidebarToggle} OpenSidebar={OpenSidebar} />
            <main className='main-container p-4 sm:p-8'>
                <div className="main-title mb-4">
                    <h3 className="text-lg sm:text-xl font-bold">LIST ROOM</h3>
                </div>
                <div className="booking-table mt-8">
                    <div className="overflow-x-auto">
                        <table className="table-auto min-w-full sm:min-w-0 md:min-w-full border-collapse border border-gray-500">
                            <thead>
                                <tr>
                                    <th className="border border-gray-500 p-2">No</th>
                                    <th className="border border-gray-500 p-2">Room Name</th>
                                    <th className="border border-gray-500 p-2">Location</th>
                                    <th className="border border-gray-500 p-2">Capacity</th>
                                    <th className="border border-gray-500 p-2">Picture</th>
                                    <th className="border border-gray-500 p-2">Action</th>
                                </tr>
                            </thead>
                            <tbody className='text-center'>
                                {bookingData.map((booking) => (
                                    <tr key={booking.id}>
                                        <td className="border border-gray-500 p-2">{booking.id}</td>
                                        <td className="border border-gray-500 p-2">{booking.roomName}</td>
                                        <td className="border border-gray-500 p-2">{booking.location}</td>
                                        <td className="border border-gray-500 p-2">{booking.capacity}</td>
                                        <td className="border border-gray-500 p-2">{booking.picture}</td>
                                        <td className="border border-gray-500 p-2">
                                            <button className="text-blue-500 mr-2" title="Detail">
                                                <FaInfoCircle />

                                            </button>
                                            <button className="text-green-500 mr-2" title="Edit" onClick={editModal}>
                                                <FaEdit />

                                            </button>
                                            <button className="text-red-500" title="Delete">
                                                <FaTrash />
                                            </button>
                                        </td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                        <button className='mt-5 bg-blue-500 text-white px-4 py-2 rounded-md' onClick={openModal}>Add</button>
                    </div>
                </div>
            </main>

            {isModalOpen && (
                <div className="fixed inset-0 flex items-center justify-center">

                    <div className="bg-white p-8 rounded-md z-10">
                        <h2 className="text-2xl font-bold mb-4 text-black">Add New Room</h2>
                        <div className="mb-4">
                            <label className="block text-sm text-black font-semibold">Room Name:</label>
                            <input
                                type="text"
                                name="roomName"
                                value={newRoomData.roomName}
                                onChange={handleInputChange}
                                className="border p-2 w-96 text-black"
                            />
                        </div>
                        <div className="mb-4">
                            <label className="block text-sm font-semibold text-black">Location:</label>
                            <input
                                type="text"
                                name="location"
                                value={newRoomData.location}
                                onChange={handleInputChange}
                                className="border p-2 w-96 text-black"
                            />
                        </div>
                        <div className="mb-4">
                            <label className="block text-sm font-semibold text-black">Capacity:</label>
                            <input
                                type="text"
                                name="capacity"
                                value={newRoomData.capacity}
                                onChange={handleInputChange}
                                className="border p-2 w-96 text-black"
                            />
                        </div>
                        <div className="mb-4">
                            <label className="block text-sm font-semibold text-black">Picture:</label>
                            <input
                                type="file"
                                name="picture"
                                accept="image/*" // Allow only image files
                                onChange={handleFileInputChange}
                                className="w-96"
                            />
                        </div>
                        <div className="flex justify-end">
                            <button onClick={closeModal} className='bg-gray-500 text-white px-4 py-2 rounded-md mr-2'>Close</button>
                            <button onClick={handleAddRoom} className='bg-blue-500 text-white px-4 py-2 rounded-md'>Submit</button>
                        </div>
                    </div>
                </div>
            )}
            {isModalEdit && (
                <div className="fixed inset-0 flex items-center justify-center">

                    <div className="bg-white p-8 rounded-md z-10">
                        <h2 className="text-2xl font-bold mb-4 text-black">Edit New Room</h2>
                        <div className="mb-4">
                            <label className="block text-sm text-black font-semibold">Room Name:</label>
                            <input
                                type="text"
                                name="roomName"
                                value={editRoomData.roomName}
                                onChange={handleEditInputChange}
                                className="border p-2 w-96 text-black"
                            />
                        </div>
                        <div className="mb-4">
                            <label className="block text-sm font-semibold text-black">Location:</label>
                            <input
                                type="text"
                                name="location"
                                value={editRoomData.location}
                                onChange={handleEditInputChange}
                                className="border p-2 w-96 text-black"
                            />
                        </div>
                        <div className="mb-4">
                            <label className="block text-sm font-semibold text-black">Capacity:</label>
                            <input
                                type="text"
                                name="capacity"
                                value={editRoomData.capacity}
                                onChange={handleEditInputChange}
                                className="border p-2 w-96 text-black"
                            />
                        </div>
                        <div className="mb-4">
                            <label className="block text-sm font-semibold text-black">Picture:</label>
                            <input
                                type="file"
                                name="picture"
                                accept="image/*" // Allow only image files
                                onChange={handleEditFileInputChange}
                                className="w-96"
                            />
                        </div>
                        <div className="flex justify-end">
                            <button onClick={closeEditModal} className='bg-gray-500 text-white px-4 py-2 rounded-md mr-2'>Close</button>
                            <button onClick={handleEditRoom} className='bg-blue-500 text-white px-4 py-2 rounded-md'>Submit</button>
                        </div>
                    </div>
                </div>
            )}
        </>
    );
};

export default ListRoom;
