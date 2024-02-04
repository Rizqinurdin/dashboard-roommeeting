import React from 'react';
import { useState } from 'react';
import { FaInfoCircle, FaEdit, FaTrash } from 'react-icons/fa';
import Header from '../component/Header';
import Sidebar from '../component/Sidebar';

const User = () => {
    const [openSidebarToggle, setOpenSidebarToggle] = useState(false);

    const [isModalOpen, setIsModalOpen] = useState(false);
    const [newUserData, setNewUserData] = useState({
        name: '',
        email: '',
        departement: '',
    });

    const [isModalEdit, setIsModalEdit] = useState(false);
    const [editRoomData, setEditRoomData] = useState({
        name: '',
        email: '',
        departement: '',
    });


    const OpenSidebar = () => {
        setOpenSidebarToggle(!openSidebarToggle);
    };

    const openModal = () => {
        setIsModalOpen(true);
    };

    const closeModal = () => {
        setIsModalOpen(false);
        setNewUserData({
            name: '',
            email: '',
            departement: ''
        });
    }

    const editModal = () => {
        setIsModalEdit(true);
    };

    const closeEditModal = () => {
        setIsModalEdit(false);
        setEditRoomData({
            name: '',
            email: '',
            departement: ''
        });
    };

    const handleAddUser = () => {
        // Add the new room data to your existing bookingData
        // This is just a sample, you may want to handle this differently
        const newUserData = [...userData, { id: userData.length + 1, ...newUserData }];
        // Update the bookingData with the new data
        setIsModalOpen(newUserData);
        // Close the modal
        closeModal();
    };

    const handleInputChange = (e) => {
        const { name, value } = e.target;
        setNewUserData((prevData) => ({
            ...prevData,
            [name]: value,
        }));
    };

    const handleEditChange = (e) => {
        const { name, value } = e.target;
        setNewUserData((prevData) => ({
            ...prevData,
            [name]: value,
        }));
    };

    const bookingData = [
        { id: 1, name: 'John Doe', email: 'johndoe@gmail.com', departement: 'IT' },
        { id: 2, name: 'Jane Doe', email: 'janedoe@gmail.com', departement: 'HR' },
        { id: 3, name: 'Alice Smith', email: 'alicesmith@gmail.com', departement: 'Sales' },

    ];

    return (
        <>
            <Header OpenSidebar={OpenSidebar} />
            <Sidebar openSidebarToggle={openSidebarToggle} OpenSidebar={OpenSidebar} />
            <main className='main-container p-4 sm:p-8'>
                <div className="main-title mb-4">
                    <h3 className="text-lg sm:text-xl font-bold">USERS</h3>
                </div>
                <div className="booking-table mt-8">
                    <div className="overflow-x-auto">
                        <table className="table-auto min-w-full sm:min-w-0 md:min-w-full border-collapse border border-gray-500">
                            <thead>
                                <tr>
                                    <th className="border border-gray-500 p-2">No</th>
                                    <th className="border border-gray-500 p-2">Name</th>
                                    <th className="border border-gray-500 p-2">Email</th>
                                    <th className="border border-gray-500 p-2">Departement</th>
                                    <th className="border border-gray-500 p-2">Action</th>
                                </tr>
                            </thead>
                            <tbody className='text-center'>
                                {bookingData.map((booking) => (
                                    <tr key={booking.id}>
                                        <td className="border border-gray-500 p-2">{booking.id}</td>
                                        <td className="border border-gray-500 p-2">{booking.name}</td>
                                        <td className="border border-gray-500 p-2">{booking.email}</td>
                                        <td className="border border-gray-500 p-2">{booking.departement}</td>
                                        <td className="border border-gray-500 p-2">
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
                        <h2 className="text-2xl font-bold mb-4 text-black">Add New User</h2>
                        <div className="mb-4">
                            <label className="block text-sm text-black font-semibold">Name:</label>
                            <input
                                type="text"
                                name="name"
                                value={newUserData.name}
                                onChange={handleInputChange}
                                className="border p-2 w-96 text-black"
                            />
                        </div>
                        <div className="mb-4">
                            <label className="block text-sm font-semibold text-black">Email:</label>
                            <input
                                type="text"
                                name="location"
                                value={newUserData.email}
                                onChange={handleInputChange}
                                className="border p-2 w-96 text-black"
                            />
                        </div>
                        <div className="mb-4">
                            <label className="block text-sm font-semibold text-black">Departement:</label>
                            <input
                                type="text"
                                name="departement"
                                value={newUserData.departement}
                                onChange={handleInputChange}
                                className="border p-2 w-96 text-black"
                            />
                        </div>
                        <div className="flex justify-end">
                            <button onClick={closeModal} className='bg-gray-500 text-white px-4 py-2 rounded-md mr-2'>Close</button>
                            <button onClick={handleAddUser} className='bg-blue-500 text-white px-4 py-2 rounded-md'>Submit</button>
                        </div>
                    </div>
                </div>
            )}

            {isModalEdit && (
                <div className="fixed inset-0 flex items-center justify-center">

                    <div className="bg-white p-8 rounded-md z-10">
                        <h2 className="text-2xl font-bold mb-4 text-black">Edit User</h2>
                        <div className="mb-4">
                            <label className="block text-sm text-black font-semibold">Name:</label>
                            <input
                                type="text"
                                name="name"
                                value={newUserData.name}
                                onChange={handleEditChange}
                                className="border p-2 w-96 text-black"
                            />
                        </div>
                        <div className="mb-4">
                            <label className="block text-sm font-semibold text-black">Email:</label>
                            <input
                                type="text"
                                name="location"
                                value={newUserData.email}
                                onChange={handleEditChange}
                                className="border p-2 w-96 text-black"
                            />
                        </div>
                        <div className="mb-4">
                            <label className="block text-sm font-semibold text-black">Departement:</label>
                            <input
                                type="text"
                                name="departement"
                                value={newUserData.departement}
                                onChange={handleEditChange}
                                className="border p-2 w-96 text-black"
                            />
                        </div>
                        <div className="flex justify-end">
                            <button onClick={closeEditModal} className='bg-gray-500 text-white px-4 py-2 rounded-md mr-2'>Close</button>
                            <button onClick={handleAddUser} className='bg-blue-500 text-white px-4 py-2 rounded-md'>Submit</button>
                        </div>
                    </div>
                </div>
            )}
        </>
    );
};

export default User;
