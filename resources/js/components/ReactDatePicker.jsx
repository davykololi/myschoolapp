import React from 'react';
import ReactDOM from 'react-dom/client';
import ReactTailDate from './ReactTailDate';

function ReactDatePicker() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Example Component</div>

                        <div className="card-body">I'm an example component!</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default ReactDatePicker;

if (document.getElementById('reactdate')) {
    const Fast = ReactDOM.createRoot(document.getElementById("reactdate"));

    Fast.render(
        <React.StrictMode>
            <ReactTailDate/>
        </React.StrictMode>
    )
}
