add_event_time_type.onclick = changeFormByTimeType;

function changeFormByTimeType() {
    var value = document.getElementById("add_event_time_type").value;

    if (value == "range")
    {
        var input = document.querySelector("#finish_time");
        input.disabled = false;
    }

    if ((value == "exact_time") || (value == ""))
    {
        var input = document.querySelector("#finish_time");
        input.value = "";
        input.disabled = true;
    }
};