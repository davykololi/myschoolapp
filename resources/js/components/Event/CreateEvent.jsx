import React, {useState} from 'react';
import ReactDOM from 'react-dom/client';
import axios from 'axios';
import EventService from "../services/EventService";

const CreateEvent = () => {
	const initialEventsState = {
    		id: null,
    		title: "",
    		description: "",
    		startDateTime: "",
    		endDateTime: "",
    		startDate: "",
    		endDate: "",
  		};

	const [event,setEvent] = useState(initialEventsState);
	const [submitted, setSubmitted] = useState(false);

	const handleOnChange = event => {
		const { name, value } = e.target
		setEvent({ ...event, [name]: value })
	}

	const saveEvent = () => {
		const data = {
			name: event.name,
			description: event.description,
			startDateTime: event.startDateTime,
			endDateTime: event.endDateTime,
			startDate: event.startDate,
			endDate: event.endDate,
		}

		EventService.create(data).then(response => {
        	setEvent({
          		id: response.data.id,
          		name: response.data.name,
          		description: response.data.description,
          		startDateTime: response.data.startDateTime,
          		endDateTime: response.data.endDateTime,
          		startDate: response.data.startDate,
          		endDate: response.data.endDate,
        		});
        		setSubmitted(true);
        		console.log(response.data);
      		}).catch(e => {
        		console.log(e);
      	});
    };

    const newEvent = () => {
    		setEvent(initialEventsState);
    		setSubmitted(false);
  		};

	return (
		<div className="submit-form">
      		{submitted ? (
        	<div>
          		<h4>You submitted successfully!</h4>
          		<button className="btn btn-success" onClick={newEvent}>
            		Add
          		</button>
        	</div>
      		) : (
        	<div>
          		<div className="form-group">
            		<label htmlFor="name">Name</label>
            		<input type="text" className="form-control" id="name" required value={event.name} onChange={handleOnChange} name="title"
            		/>
          		</div>

          		<div className="form-group">
            		<label htmlFor="description">Description</label>
            		<input type="text" className="form-control" id="description" required value={event.description} onChange={handleOnChange}
              			name="description"/>
          		</div>

          		<div className="form-group">
            		<label htmlFor="startDateTime">Start Time</label>
            		<input type="text" className="form-control" id="startDateTime" required value={event.startDateTime} onChange={handleOnChange}
              			name="startDateTime"/>
          		</div>

          		<div className="form-group">
            		<label htmlFor="endDateTime">End Time</label>
            		<input type="text" className="form-control" id="endDateTime" required value={event.endDateTime} onChange={handleOnChange}
              			name="endDateTime"/>
          		</div>

          		<div className="form-group">
            		<label htmlFor="startDate">Start Date</label>
            		<input type="text" className="form-control" id="startDate" required value={event.startDate} onChange={handleOnChange}
              			name="startDate"/>
          		</div>

          		<div className="form-group">
            		<label htmlFor="endDate">End Time</label>
            		<input type="text" className="form-control" id="endDate" required value={event.endDate} onChange={handleOnChange}
              			name="endDate"/>
          		</div>

          			<button onClick={saveEvent} className="btn btn-success">
            			Submit
          			</button>
        	</div>
      		)}
    	</div>
		);
}

export default CreateEvent;