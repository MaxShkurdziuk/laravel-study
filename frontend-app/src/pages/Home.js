import { useEffect, useRef, useState } from "react";
import PostFilmCard from "../components/PostFilmCard";

const Home = () => {
    const dataLoaded = useRef(false);
    const [films, setMovies] = useState([]);

    useEffect(() => {
        if (dataLoaded.current) {
            return;
        }
        dataLoaded.current = true;

        const url = `${process.env.REACT_APP_API_URL}/api/movies`;
        fetch(url)
            .then(response => response.json())
            .then(json => setMovies(json.data));
    }, []);

    return (
        <div className="row mt-4">
            <div className="col-md-8">
                {films.map(film => 
                <PostFilmCard
                    id={film.id}
                    key={film.id} 
                    name={film.name}
                    year={film.year} 
                    genres={film.genres} 
                    actors={film.actors}/>)}
            </div>
        </div>
    );
};

export default Home;