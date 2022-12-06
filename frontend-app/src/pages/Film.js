import { useEffect, useState, useRef } from "react";
import { useParams } from "react-router-dom";

const Film = () => {
    const { id } = useParams();
    const dataLoaded = useRef(false);
    const [film, setMovie] = useState(null);

    useEffect(() => {
        if (dataLoaded.current) {
            return;
        }
        dataLoaded.current = true;

        const url = `${process.env.REACT_APP_API_URL}/api/movies/${id}`;
        fetch(url)
            .then(response => response.json())
            .then(json => setMovie(json.data));
    }, []);

    if (film === null) {
        return <h1>Best film are in loading...</h1>;
    }

    return (
        <>
            <h3>{ film.name }</h3>
            <p className="mb-1 text-muted">{ film.actors.map(actor => <span key={actor.id}>{actor.first_name} {actor.last_name} </span>) }</p>
            <p className="mb-1 text-muted">{ film.genres.map(genre => <span key={genre.id}>{genre.name} </span>) }</p>
            <p>{ film.description }</p>
        </>
    );
}

export default Film;