function getBotResponse(input) {
    //rock paper scissors
    if (input == "số điện thoại") {
        return "0869200200";
    } else if (input == "xin chào" || input == "chào" || input == "Hi") {
        return "Chào quá khách!";
    }
    // Simple responses
    if (input == "email") {
        return "dingvog@gmail.com";
    } else if (input == "bye") {
        return "Tạm biệt quý khách!";
    }else if (input == "địa chỉ" || input == "địa chỉ shop") {
        return "Phường Xuân Khánh,Quận Ninh Kiều, Cần Thơ";
    }
    
    else {
        return "Chào quý khách!. Bạn có câu hỏi nào không?";
    }
    
}