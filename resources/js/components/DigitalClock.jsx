import { useState, useEffect } from 'react';

function DigitalClock() {
  const [date, setDate] = useState(new Date());
  
  useEffect(() => {
    const intervalId = setInterval(() => {
      setDate(new Date());
    }, 1000)

    return () => clearInterval(intervalId);
  }, [])

  return (
    <p className='clock center'>
      {date.toLocaleTimeString()}
    </p>
  );
}

export default DigitalClock;
