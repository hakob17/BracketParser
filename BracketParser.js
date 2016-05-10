


var Stack = function() {
	this.stack = [];
	this.getLast = this.stack[this.stack.length-1];
}

var stck = new Stack();

var Parser = function(str) {

	if (typeof(str) !== "string") {
		return false;
	}


	for (var i =0; i < str.length; i++) {
		if(!pushElement(str.charAt(i))) {
			return false;
		}
	}
	if(stck.length >0) {
		return false;
	}
	return true;
}

var pushElement = function(el) {
	switch(el) {
		case '(':
            stck.stack.push(el);
            break;
        case '{':
            stck.stack.push(el);
            break;
        case '[':
            stck.stack.push(el);
            break;
        default:
            return compare(el);
   }

    return true;
}

var compare = function(el) {
	if(stck.stack[stck.stack.length-1] === returnPair(el)) {
		stck.stack.pop();

		return true;
	}
	return false;
}

var returnPair = function(el) {

	switch (el) {
            case '(':
                return ')';
            case ')':
                return '(';
            case '{':
                return '}';
            case '}':
                return '{';
            case '[':
                return ']';
            case ']':
                return '[';
        }
}


/*
var str1 = "({[]})";
var str2 = '()({})[][)';


var str3 = "({[]})(){}[]{]";
var str4 = '()({})[][]{}[]()';


if (Parser(str1)){
	console.log("IS OK");
}else {
	console.log("IS WRONG");
}

if (Parser(str2)){
	console.log("IS OK");
}else {
	console.log("IS WRONG");
}
if (Parser(str3)){
	console.log("IS OK");
}else {
	console.log("IS WRONG");
}

if (Parser(str4)){
	console.log("IS OK");
}else {
	console.log("IS WRONG");
}*/