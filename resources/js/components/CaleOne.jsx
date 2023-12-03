import React from "react";

var CaleOne = React.createClass({
  render: function() {
    return (
      <div className="site">
        <Sidebar />
        <Content />
      </div>
    );
  }
});

var Sidebar = React.createClass({
  render: function() {
    return (
      <div className="sidebar">
        
      </div>
    );
  }
});

var Content = React.createClass({
  render: function() {
    var monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];
    var now = new Date();
    return (
      <div className="content">
        <h1>{ monthNames[now.getMonth()] } { now.getFullYear() }</h1>
        <Calendar />
      </div>
    )
  }
});


var Day = React.createClass({
  getInitialState: function() {
    return {
      classes: "date"
    }
  },
  linkClickEvent: function() {
    if ( this.state.classes.indexOf("date--active") == -1 ) {
      this.setState({ classes: this.state.classes + " date--active" });
    }
  },
  render: function() {
    if ( this.props.fade && this.state.classes.indexOf("date--fade") == -1 ) {
      this.state.classes += " date--fade";
    }
    if ( this.props.current && this.state.classes.indexOf("date--current") == -1 ) {
      this.state.classes += " date--current";
    }
    return (
      <li className={ this.state.classes }>
        <a href="#" onClick={ this.linkClickEvent }>{ this.props.date }</a>
      </li>
    );
  }
});

var Calendar = React.createClass({
  render: function() {
    var now = new Date();
    
    var MonthFirstDay = new Date(now.getFullYear(), now.getMonth() + 1, 1);
    
    var DaysInMonth = new Date(now.getFullYear(), now.getMonth() + 1, 0).getDate();

    var FirstWeekday = MonthFirstDay.getDay();

    var dates = [];
    
    var DatePrev = new Date(now.getDate() - FirstWeekday);
    var DaysInMonthPrev = new Date(DatePrev.getFullYear(), DatePrev.getMonth() + 1, 0).getDate();
    
    var totalDays = FirstWeekday + DaysInMonth;
    
    for ( var i = DaysInMonthPrev - FirstWeekday + 1; i <= DaysInMonthPrev; i++ ) {
      dates.push( <Day date={ i } fade={true} /> );
    }

    for ( var i = 1; i <= DaysInMonth; i++ ) {
      dates.push( <Day date={ i } current={ i == now.getDate() }/> );
    }
    
    for ( var i = 1; i <= totalDays % 7 + 1; i++ ) {
      dates.push( <Day date={ i } fade={true} /> );
    }
    
    var weekdays = ["SUN", "MON", "TUE", "WED", "THU", "FRI", "SAT"];
    
    var week = [];
    
    for ( var i = 0; i < weekdays.length; i++) {
      var classes = "weekday";
      if ( now.getDay() == i ) {
        classes += " weekday--current";
      }
      week.push(
        <li className={ classes }>
          <div className="weekday__inner">{ weekdays[i] }</div>
        </li>
      );
    }

    return (
      <div className="calendar">
        <ul className="weekdays">{ week }</ul>
        <ul className="dates">{ dates }</ul>
      </div>
    );
  }
});


ReactDOM.render(
  <CaleOne/>,
  document.querySelector('#main')
)