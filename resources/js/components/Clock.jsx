import AnalogClock from 'analog-clock-react';
   
export default function Clock() {
  let options = {
    width: "200px",
    border: true,
    borderColor: "#2e2e2e",
    baseColor: "#17a2b8",
    centerColor: "#459cff",
    centerBorderColor: "#ffffff",
    handColors: {
      second: "#d81c7a",
      minute: "#ffffff",
      hour: "#ffffff"
    }
  };
   
  return (
    <div style="marginLeft: 50px">
      <AnalogClock {...options} />
    </div>
  )
}