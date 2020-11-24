function isStringEmpty(val){
    if(!Boolean(val) || val.length === 0){
        return true;
    }else{
        return false;
    }
}
function stringContainsNumber(val){
    let pattern = new RegExp("^[a-zA-Z\b ]+$");
    if(pattern.test(val)){
        return false;
    }
    return true;
}
function isStringAnEmail(val){
    let pattern = new RegExp("^[\\w-\\.]+@([\\w-]+\\.)+[\\w-]{2,4}$");
    if(pattern.test(val)){
        return true;
    }
    return false;
}
function compareStrLength(val, len){
    if(val.length >= len){
        return true;
    }
    return false;
}
function strictEqualLength(val, len){
    if(val.length === len){
        return true;
    }
    return false;
}
function removeNumbers(el){
    return el.substr(0, el.length - 1)
}
function isStringEqual(val1, val2){
    if(val1 === val2){
        return true;
    }
    return false;
}
