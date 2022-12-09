function successAlert(message){
    notif({
        msg: `<b>Thành công:</b> ${message}`,
        type: "success"
    });
}

function dangerAlert(){
    notif({
        type: "error",
        msg: "<b>Lỗi: </b>Không thể thực hiện.",
        position: "center",
        width: 500,
        height: 60,
    });
}