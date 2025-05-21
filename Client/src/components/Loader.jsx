import React from 'react';
import { motion } from 'framer-motion';

const Loader = () => {
  return (
    <motion.div
      className="fixed inset-0 flex items-center justify-center z-50"
      initial={{ opacity: 0 }}
      animate={{ opacity: 1 }}
      exit={{ opacity: 0 }}
    >
      <motion.div
        className="relative w-12 h-12"
        animate={{ rotate: 360 }}
        transition={{ repeat: Infinity, duration: 1, ease: 'linear' }}
      >
        <div className="absolute inset-0 border-4 border-indigo-500 border-t-transparent rounded-full"></div>
        <div className="absolute inset-1 border-4 border-indigo-300 border-b-transparent rounded-full"></div>
      </motion.div>
    </motion.div>
  );
};

export default Loader;
