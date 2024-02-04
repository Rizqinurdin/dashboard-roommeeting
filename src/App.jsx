import React from 'react';
import { useState } from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Home from './Home';
import './App.css'
import './index.css'
import Header from './component/Header';
import Sidebar from './component/Sidebar';
import ListRoom from './pages/ListRoom';
import User from './pages/User';
import BookingList from './pages/BookingList';
import Reports from './pages/Reports';
import Setting from './pages/Setting';
import Dashboard from './user/Dashboard';
import RoomList from './user/RoomList';

function App() {
  const [openSidebarToggle, setOpenSidebarToggle] = useState(false);

  const OpenSidebar = () => {
    setOpenSidebarToggle(!openSidebarToggle);
  };

  return (
    <Router>
      <div className='grid-container'>
        <Routes>
          <Route path='/' element={<Home />} />
          <Route path='/header' element={<Header OpenSidebar={OpenSidebar} />} />
          <Route
            path='/sidebar'
            element={<Sidebar openSidebarToggle={openSidebarToggle} OpenSidebar={OpenSidebar} />}
          />
          <Route path='/list-rooms' element={<ListRoom />} />
          <Route path='/user' element={<User />} />
          <Route path='/booking-list' element={<BookingList />} />
          <Route path='/report' element={<Reports />} />
          <Route path='/setting' element={<Setting />} />
          <Route path='/home-user' element={<Dashboard />} />
          <Route path='/room-list' element={<RoomList />} />
        </Routes>
      </div>
    </Router>
  );
}

export default App;
