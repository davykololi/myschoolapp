import React from 'react';
import ReactDOM from 'react-dom/client';
import Clock from './Clock';
import DigitalClock from './DigitalClock';
import ClockTwo from './ClockTwo';

function Example() {
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

export default Example;

if (document.getElementById('example')) {
    const Index = ReactDOM.createRoot(document.getElementById("example"));

    Index.render(
        <React.StrictMode>
            <DigitalClock/>
            <ClockTwo/>
            <Clock/>
        </React.StrictMode>
    )
}
