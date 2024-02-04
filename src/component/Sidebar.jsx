import React from 'react';
import { Link } from 'react-router-dom';
import { BsGrid1X2Fill, BsFillGrid3X3GapFill, BsListCheck, BsFillGearFill, BsPersonCircle, BsClipboard, BsFileTextFill } from 'react-icons/bs';

const Sidebar = ({ openSidebarToggle, OpenSidebar }) => {
    return (
        <aside id='sidebar' className={openSidebarToggle ? "sidebar-responsive" : ""}>
            <div className="sidebar-title flex justify-between items-center mb-4">
                <div className="sidebar-brand flex items-center">
                    <BsFillGrid3X3GapFill className='icon-header mr-2' /> Meeting Room
                </div>

                <span className='icon close-icon' onClick={OpenSidebar}>X</span>
            </div>

            <ul className='sidebar-list'>
                <li className='sidebar-list-item'>
                    <Link to="/" className="flex items-center">
                        <BsGrid1X2Fill className='icon' /> Dashboard
                    </Link>
                </li>
                <li className='sidebar-list-item'>
                    <Link to="/list-rooms" className="flex items-center">
                        <BsListCheck className='icon' /> List Rooms
                    </Link>
                </li>
                <li className='sidebar-list-item'>
                    <Link to="/user" className="flex items-center">
                        <BsPersonCircle className='icon' /> User
                    </Link>
                </li>

                <li className='sidebar-list-item'>
                    <Link to="/booking-list" className="flex items-center">
                        <BsClipboard className='icon' /> Booking List
                    </Link>
                </li>
                <li className='sidebar-list-item'>
                    <Link to="/report" className="flex items-center">
                        <BsFileTextFill className='icon' /> Reports
                    </Link>
                </li>
                <li className='sidebar-list-item'>
                    <Link to="/setting" className="flex items-center">
                        <BsFillGearFill className='icon' /> Setting
                    </Link>
                </li>
            </ul>

        </aside>
    );
}

export default Sidebar;
