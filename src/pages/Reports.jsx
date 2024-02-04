import React, { useState } from 'react';
import DatePicker from 'react-datepicker';
import 'react-datepicker/dist/react-datepicker.css';
import Header from '../component/Header';
import Sidebar from '../component/Sidebar';
import { FaPrint } from 'react-icons/fa';

const Reports = () => {
    const [startDate, setStartDate] = useState(null);
    const [endDate, setEndDate] = useState(null);

    const [openSidebarToggle, setOpenSidebarToggle] = useState(false);

    const OpenSidebar = () => {
        setOpenSidebarToggle(!openSidebarToggle);
    };

    return (
        <>
            <Header OpenSidebar={OpenSidebar} />
            <Sidebar openSidebarToggle={openSidebarToggle} OpenSidebar={OpenSidebar} />

            <main className='main-container p-4 sm:p-8'>
                <div className="main-title mb-4">
                    <h3 className="text-xl sm:text-2xl font-bold">REPORTS</h3>
                </div>

                <div className="flex space-x-4">
                    <div>
                        <label className="block text-sm font-medium text-white-700 mb-1">Start Date:</label>
                        <DatePicker
                            selected={startDate}
                            onChange={(date) => setStartDate(date)}
                            dateFormat="dd/MM/yyyy"
                            className="border rounded-md px-3 py-2 outline-none focus:ring focus:ring-blue-400 text-black"
                        />
                    </div>

                    <div>
                        <label className="block text-sm font-medium text-white-700 mb-1">End Date:</label>
                        <DatePicker
                            selected={endDate}
                            onChange={(date) => setEndDate(date)}
                            dateFormat="dd/MM/yyyy"
                            className="border rounded-md px-3 py-2 outline-none focus:ring focus:ring-blue-400 text-black"
                        />
                    </div>
                </div>
                <button className='mt-5 bg-blue-500 text-white px-4 py-2 rounded-md flex items-center'>
                    <span className="mr-2">
                        <FaPrint />
                    </span>
                    Print
                </button>
            </main>



        </>
    );
};

export default Reports;
