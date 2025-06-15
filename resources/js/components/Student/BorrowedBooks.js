import React, {useState, useEffect} from 'react';
import axios from 'axios';

const BorrowedBooks = () => {
		const {borrowedBooks, setBorrowedBooks} = useState([]);
		const {loading, setLoading} = useState(false);

		useEffect(()=> {
			getBooks();
		},[])

		const getBooks = async() => {
			try{
				setLoading(true);
				 const resp = await axios.get('http://localhost:8000/api/student-borrowed-books');
				 const data = resp.data;
				 setLoading(false);
				 setBorrowedBooks(data);
			} catch(error){
				console.error(error);
			}
		}
	return (
		<>
			{loading ? <div>...loading</div> :

			<div>
			{borrowedBooks.map((item) =>
				<li key={item.id}></li>
			)}
			</div>
			}

		</>
		);
}