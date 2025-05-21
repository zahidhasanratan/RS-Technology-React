import React from 'react';
import { Link } from 'react-router-dom';
import { motion } from 'framer-motion';

export const NotFoundPage = () => {
  return (
    <motion.div
      className="min-h-screen flex items-center justify-center px-4 bg-gray-100"
      initial={{ opacity: 0 }}
      animate={{ opacity: 1 }}
    >
      <div className="text-center">
        <h1 className="text-6xl font-extrabold text-indigo-600">404</h1>
        <h2 className="text-2xl font-semibold mt-4 text-gray-800">
          Oops! Page not found
        </h2>
        <p className="mt-2 text-gray-600">
          The page you’re looking for doesn’t exist or has been moved.
        </p>
        <Link
          to="/"
          className="mt-6 inline-block px-6 py-3 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition"
        >
          Go to Homepage
        </Link>
      </div>
    </motion.div>
  );
};
