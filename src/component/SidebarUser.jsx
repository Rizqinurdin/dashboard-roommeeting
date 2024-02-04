import React from 'react';
import { Link } from 'react-router-dom';
import { BsGrid1X2Fill, BsFillGrid3X3GapFill, BsListCheck, BsClipboard } from 'react-icons/bs';

const SidebarUser = ({ openSidebarToggle, OpenSidebar }) => {
    return (
        <aside id='sidebar' className={openSidebarToggle ? "sidebar-responsive" : ""}>
            <div className="sidebar-title flex justify-between items-center mb-4">
                <div className="sidebar-brand flex items-center">
                    <BsFillGrid3X3GapFill className='icon-header mr-2' /> Reservasi Meeting Room
                </div>

                <span className='icon close-icon' onClick={OpenSidebar}>X</span>
            </div>
            <ul className='sidebar-list'>
                <li className='sidebar-list-item'>
                    <Link to="/home-user" className="flex items-center">
                        <BsGrid1X2Fill className='icon' /> Home
                    </Link>
                </li>
                <li className='sidebar-list-item'>
                    <Link to="/room-list" className="flex items-center">
                        <BsListCheck className='icon' /> Rooms Meeting
                    </Link>
                </li>
                <li className='sidebar-list-item'>
                    <Link to="#" className="flex items-center">
                        <BsClipboard className='icon' /> Office Stationery
                    </Link>
                </li>
            </ul>

        </aside>
    );
}

export default SidebarUser;
