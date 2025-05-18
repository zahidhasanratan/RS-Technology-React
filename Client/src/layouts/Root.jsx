import React from 'react'
import Navbar from "../components/Navbar"
import Footer from "../components/Footer"
import { Outlet } from 'react-router-dom'
export const Root = () => {
  return (
    <div>
        <Navbar></Navbar>
        <Outlet></Outlet>
        <Footer></Footer>
    </div>
  )
}
