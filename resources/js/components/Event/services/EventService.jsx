import http from "../http-common";

const getAll = () => {
  return http.get("/events");
};

const get = id => {
  return http.get(`/events/${id}`);
};

const create = data => {
  return http.post("/events", data);
};

const update = (id, data) => {
  return http.put(`/events/${id}`, data);
};

const remove = id => {
  return http.delete(`/events/${id}`);
};

const removeAll = () => {
  return http.delete(`/events`);
};

const findByName = name => {
  return http.get(`/events?event=${name}`);
};

const EventService = {
  getAll,
  get,
  create,
  update,
  remove,
  removeAll,
  findByName
};

export default EventService;
