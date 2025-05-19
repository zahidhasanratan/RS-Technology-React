import React, { useEffect, useState } from 'react';
import Navbar from "../components/Navbar";
import Footer from "../components/Footer";
import Loader from "../components/Loader";
import { Outlet, useNavigation } from 'react-router-dom';

export const Root = () => {
  const navigation = useNavigation();
  const [isInitialLoading, setIsInitialLoading] = useState(true);

  useEffect(() => {
    // Handle first full page load
    const handleLoad = () => {
      setTimeout(() => setIsInitialLoading(false), 500);
    };

    if (document.readyState === 'complete') {
      handleLoad();
    } else {
      window.addEventListener('load', handleLoad);
      return () => window.removeEventListener('load', handleLoad);
    }
  }, []);

  const isRouteChanging = navigation.state === 'loading';

  return (
    <>
      {(isInitialLoading || isRouteChanging) && <Loader />}
      <div className={(isInitialLoading || isRouteChanging) ? 'invisible' : 'visible'}>
        <Navbar />
        <Outlet />
        <Footer />
      </div>
    </>
  );
};
