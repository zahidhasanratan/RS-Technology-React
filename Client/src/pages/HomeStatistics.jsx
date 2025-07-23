import React, { useEffect, useState } from 'react';

export const HomeStatistics = () => {
  const [stats, setStats] = useState(null);

  useEffect(() => {
    const fetchStats = async () => {
      try {
        const res = await fetch('https://server.rst-bd.com/api/statistics');
        const data = await res.json();
        setStats(data[0]); // assuming only one object in the array
      } catch (err) {
        console.error('Failed to fetch statistics:', err);
      }
    };

    fetchStats();
  }, []);

  useEffect(() => {
    if (!stats) return;

    let counterStarted = false;

    function animateCount(el, end) {
      let start = 0;
      const duration = 2000;
      const stepTime = Math.max(10, Math.floor(duration / end));

      const timer = setInterval(() => {
        start++;
        el.textContent = start.toLocaleString(); // commas
        if (start >= end) clearInterval(timer);
      }, stepTime);
    }

    function startCounters() {
      if (counterStarted) return;
      const counters = document.querySelectorAll('.counter');
      counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-count'), 10);
        animateCount(counter, target);
      });
      counterStarted = true;
    }

    const observer = new IntersectionObserver(
      entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            startCounters();
            observer.disconnect();
          }
        });
      },
      { threshold: 0.5 }
    );

    const counterSection = document.getElementById('counter-section');
    if (counterSection) {
      observer.observe(counterSection);
    }
  }, [stats]);

  if (!stats) return null; // Optional: show loader if needed

  return (
    <section className="bg-white dark:bg-gray-900 py-16" id="counter-section">
      <div className="max-w-7xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
        <div className="bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all p-6">
          <h3 className="text-4xl font-bold text-[#1e1b4b] counter" data-count={stats.description}>0</h3>
          <p className="mt-2 font-medium text-gray-600 dark:text-gray-300">{stats.title}</p>
        </div>

        <div className="bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all p-6">
          <h3 className="text-4xl font-bold text-[#1e1b4b] counter" data-count={stats.designation2}>0</h3>
          <p className="mt-2 font-medium text-gray-600 dark:text-gray-300">{stats.title2}</p>
        </div>

        <div className="bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all p-6">
          <h3 className="text-4xl font-bold text-[#1e1b4b] counter" data-count={stats.designation3}>0</h3>
          <p className="mt-2 font-medium text-gray-600 dark:text-gray-300">{stats.title3}</p>
        </div>

        <div className="bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all p-6">
          <h3 className="text-4xl font-bold text-[#1e1b4b] counter" data-count={stats.designation4}>0</h3>
          <p className="mt-2 font-medium text-gray-600 dark:text-gray-300">{stats.title4}</p>
        </div>
      </div>
    </section>
  );
};
