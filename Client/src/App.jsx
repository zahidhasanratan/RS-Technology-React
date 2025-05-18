import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Home from './pages/Home';
import About from './pages/About';
import Management from './pages/Management';
import News from './pages/News';
import Photo from './pages/Photo';
import Video from './pages/Video';
import ContactUs from './pages/ContactUs';
import Clients from './pages/Clients';
import Solutions from './pages/Solutions';
import Products from './pages/Products';
import Navbar from './components/Navbar';
import Footer from './components/Footer';
import NewsSingle from './Shared/News/NewsSingle';
import SingleAlbum from './Shared/PhotoAlbum/SingleAlbum';
import Empty from './pages/Empty';
import SingleSolution from './Shared/SingleSolution';
import Career from './pages/Career';
import JobDetails from './Shared/CareerJob/JobDetails';
import Apply from './Shared/CareerJob/Apply';
import ProjectDetails from './Shared/Projects/ProjectDetails';

function App() {
  return (
    <Router>
      <div className="font-barlow">
        <Navbar />

        <main className="">
          <Routes>
            <Route path="/" element={<Home />} />
            <Route path="/about" element={<About />} />
            <Route path="/management" element={<Management />} />
            <Route path="/news" element={<News />} />
            <Route path="/news/:id" element={<NewsSingle />} />
            <Route path="/photo" element={<Photo />} />
            <Route path="/photo/:id" element={<SingleAlbum />} />
            <Route path="/video" element={<Video />} />
            <Route path="/contact" element={<ContactUs />} />
            <Route path="/clients" element={<Clients />} />
            <Route path="/solution" element={<Solutions />} />
            <Route path="/singlesolution" element={<SingleSolution />} />
            <Route path="/products" element={<Products />} />
            <Route path="/empty" element={<Empty />} />
            <Route path="/career" element={<Career />} />
            <Route path="/jobdetails" element={<JobDetails />} />
            <Route path="/apply" element={<Apply />} />
            <Route path="/projectdetails" element={<ProjectDetails />} />

          </Routes>
        </main>

        <Footer />
      </div>
    </Router>
  );
}

export default App;