import React from 'react';
import { BsFillBellFill, BsFillEnvelopeFill, BsPersonCircle, BsSearch, BsJustify } from 'react-icons/bs';

const Header = ({ OpenSidebar }) => {
    return (
        <header className='header bg-gray-800 text-white p-4 flex justify-between items-center'>
            <div className="menu-icon">
                <BsJustify className='icon' onClick={OpenSidebar} />
            </div>
            <div className="header-left">
                <BsSearch className='icon' />
            </div>
            <div className="header-right flex items-center space-x-4">
                <BsFillBellFill className='icon' />
                <BsFillEnvelopeFill className='icon' />
                <BsPersonCircle className='icon' />
            </div>
        </header>
    );
}

export default Header;
