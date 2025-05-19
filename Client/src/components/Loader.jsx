
import React from 'react';
import { motion } from 'framer-motion';

const Loader = () => {
  return (
    <motion.div
      className="fixed inset-0 flex items-center justify-center bg-indigo-900 z-50"
      initial={{ opacity: 1 }}
      animate={{ opacity: 1 }}
      exit={{ opacity: 0 }}
    >
      <motion.div
        className="w-16 h-16 border-4 border-white border-t-transparent rounded-full animate-spin"
        transition={{ repeat: Infinity, duration: 1 }}
      />
    </motion.div>
  );
};

export default Loader;
