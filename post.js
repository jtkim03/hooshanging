class Post {
    constructor(destination, datetime, description, type) {
        this.destination = destination;
        this.datetime = datetime;
        this.description = description;
        this.type = type;
    }
    get destination() {
        return this.destination;
    }
    set destination(dest) {
        this.destination = dest;
    }
    get datetime() {
        return this.datetime;
    }
    set datetime(dt) {
        this.datetime = dt;
    }
    get description() {
        return this.description;
    }
    set description(desc) {
        this.desc = desc;
    }
    get type() {
        return this.type;
    }
    set type(t) {
        this.type = t;
    }
}