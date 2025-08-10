import React, { useEffect, useState } from "react";
import {
  FaFacebookF,
  // FaInstagram, // ← uncomment if you decide to show Instagram again
  FaPhoneAlt,
  FaMapMarkerAlt,
  FaEnvelope,
  FaHome,
  FaLinkedinIn,
} from "react-icons/fa";
import { FaXTwitter } from "react-icons/fa6";
import { Link } from "react-router-dom";

const Footer = () => {
  const [aboutData, setAboutData] = useState(null);
  const [contactData, setContactData] = useState(null);
  const [socialLinks, setSocialLinks] = useState(null);
  const [footerMenu, setFooterMenu] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const [aboutRes, contactRes, socialRes, menuRes] = await Promise.all([
          fetch("https://server.rst-bd.com/api/footerother"),
          fetch("https://server.rst-bd.com/api/footercontact"),
          fetch("https://server.rst-bd.com/api/social"),
          fetch("https://server.rst-bd.com/api/footermenu"),
        ]);

        if (!aboutRes.ok || !contactRes.ok || !socialRes.ok || !menuRes.ok) {
          throw new Error("Network response was not ok");
        }

        const aboutJson = await aboutRes.json();
        const contactJson = await contactRes.json();
        const socialJson = await socialRes.json();
        const menuJson = await menuRes.json();

        setAboutData(Array.isArray(aboutJson) && aboutJson.length > 0 ? aboutJson[0] : null);
        setContactData(Array.isArray(contactJson) && contactJson.length > 0 ? contactJson[0] : null);
        setSocialLinks(Array.isArray(socialJson) && socialJson.length > 0 ? socialJson[0] : null);
        setFooterMenu(Array.isArray(menuJson) ? menuJson : []);
      } catch (err) {
        console.error("Fetch error:", err);
        setError(err.message);
      } finally {
        setLoading(false);
      }
    };

    fetchData();
  }, []);

  return (
    <footer className="bg-indigo-950 text-white pt-10 text-md md:px-24 lg:px-24">
      <div className="container mx-auto px-4">
        <div className="flex flex-col md:flex-row flex-wrap gap-8 lg:gap-12">
          {/* About Section */}
          <div className="w-full md:w-[calc(50%-16px)] lg:w-[40%] space-y-4">
            <h3 className="text-xl font-semibold">About Us</h3>
            {loading && <p>Loading...</p>}
            {error && <p className="text-red-400">Error: {error}</p>}
            {!loading && aboutData && (
              <p className="leading-relaxed">{aboutData.description}</p>
            )}

            {/* Social Icons */}
            <div className="flex space-x-4 text-xl">
              {/* Home */}
              <Link to="/" aria-label="Home">
                <FaHome className="border text-4xl rounded-full p-2 hover:text-yellow-900 hover:border-yellow-900 transition-colors" />
              </Link>

              {/* Facebook */}
              {socialLinks?.title && (
                <a
                  href={socialLinks.title}
                  target="_blank"
                  rel="noopener noreferrer"
                  aria-label="Facebook"
                >
                  <FaFacebookF className="border text-4xl rounded-full p-2 hover:text-yellow-900 hover:border-yellow-900 transition-colors" />
                </a>
              )}

              {/* LinkedIn */}
              {socialLinks?.description && (
                <a
                  href={socialLinks.description}
                  target="_blank"
                  rel="noopener noreferrer"
                  aria-label="LinkedIn"
                >
                  <FaLinkedinIn className="border text-4xl rounded-full p-2 hover:text-yellow-900 hover:border-yellow-900 transition-colors" />
                </a>
              )}

              {/* X (Twitter) */}
              {socialLinks?.slug && (
                <a
                  href={socialLinks.slug}
                  target="_blank"
                  rel="noopener noreferrer"
                  aria-label="X (Twitter)"
                >
                  <FaXTwitter className="border text-4xl rounded-full p-2 hover:text-yellow-900 hover:border-yellow-900 transition-colors" />
                </a>
              )}

              {/* Instagram (optional) */}
              {/* {socialLinks?.title2 && (
                <a
                  href={socialLinks.title2}
                  target="_blank"
                  rel="noopener noreferrer"
                  aria-label="Instagram"
                >
                  <FaInstagram className="border text-4xl rounded-full p-2 hover:text-yellow-900 hover:border-yellow-900 transition-colors" />
                </a>
              )} */}
            </div>
          </div>

          {/* Footer Menu / Quick Links */}
          <div className="w-full md:w-[calc(50%-16px)] lg:w-[20%] space-y-6">
            <h3 className="text-xl font-semibold text-white mb-4">Quick Links</h3>
            {loading && <p>Loading links...</p>}
            {!loading && (
              <ul className="space-y-3">
                {footerMenu.map((link, idx) => {
                  const isExternal = link.page_type === "url";
                  const href = isExternal ? link.external_link : `/page/${link.slug}`;

                  return (
                    <li key={idx}>
                      {isExternal ? (
                        <a
                          href={href}
                          target="_blank"
                          rel="noopener noreferrer"
                          className="text-gray-300 hover:text-indigo-300 transition-colors duration-200 flex items-center"
                        >
                          {link.menu_name}
                        </a>
                      ) : (
                        <Link
                          to={href}
                          className="text-gray-300 hover:text-indigo-300 transition-colors duration-200 flex items-center"
                        >
                          {link.menu_name}
                        </Link>
                      )}
                    </li>
                  );
                })}
              </ul>
            )}
          </div>

          {/* Contact Section */}
          <div className="w-full md:w-full lg:w-[30%] space-y-4">
            <h3 className="text-xl font-semibold">Contact</h3>
            {loading && <p>Loading contact...</p>}
            {!loading && contactData && (
              <div className="space-y-4">
                <div className="flex items-start gap-3 group">
                  <a
                    href="https://maps.app.goo.gl/CEnWDHVQTrvs9N5y6"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Open in Google Maps"
                  >
                    <div className="border bg-[#FFFFFF1A] text-2xl p-3 rounded-full flex items-center justify-center hover:bg-indigo-950 hover:border-white transition-colors">
                      <FaMapMarkerAlt />
                    </div>
                  </a>
                  <p>{contactData.title}</p>
                </div>

                <div className="flex items-start gap-3 group">
                  <a href={`tel:${contactData.slug}`} aria-label="Call phone number">
                    <div className="border bg-[#FFFFFF1A] text-2xl p-3 rounded-full flex items-center justify-center hover:bg-indigo-950 hover:border-white transition-colors">
                      <FaPhoneAlt />
                    </div>
                  </a>
                  <a href={`tel:${contactData.slug}`} className="hover:text-indigo-300">
                    {contactData.slug}
                  </a>
                </div>

                <div className="flex items-start gap-3 group">
                  <a
                    href={`mailto:${contactData.description}`}
                    aria-label="Send email"
                  >
                    <div className="border bg-[#FFFFFF1A] text-2xl p-3 rounded-full flex items-center justify-center hover:bg-indigo-950 hover:border-white transition-colors">
                      <FaEnvelope />
                    </div>
                  </a>
                  <a
                    href={`mailto:${contactData.description}`}
                    className="hover:text-indigo-300 lowercase"
                  >
                    {contactData.description}
                  </a>
                </div>
              </div>
            )}
          </div>
        </div>
      </div>

      {/* Bottom Bar */}
      <div className="border-t border-indigo-800 mt-10 py-6">
        <div className="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center text-indigo-100">
          <p>Copyright © 2025 RS Technologies Ltd. All Rights Reserved.</p>
          <p className="mt-2 md:mt-0">
            <a
              href="https://esoft.com.bd/"
              target="_blank"
              rel="noopener noreferrer"
              className="hover:text-indigo-300"
            >
              Web Design Company:{" "}
              <span className="font-cursive">
                e-<span className="text-red-400">S</span>oft
              </span>
            </a>
          </p>
        </div>
      </div>
    </footer>
  );
};

export default Footer;
