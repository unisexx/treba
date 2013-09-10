jQuery.extend(DateInput.DEFAULT_OPTS, {
  month_names: ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"],
  short_month_names: ["ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."],
  short_day_names: ["อ.","จ.", "อ.", "พ.", "พฤ.", "ศ.", "ส."],
  stringToDate: function(string) {
      var matches;
      if (matches = string.match(/^(\d{2,2})\/(\d{2,2})\/(\d{4,4})$/)) {
          return new Date(matches[3]-543, matches[2] - 1, matches[1]);
      } else {
          return null;
      };
  },
  dateToString: function(date) {
      var month = (date.getMonth() + 1).toString();
      var dom = date.getDate().toString();
      if (month.length == 1) month = "0" + month;
      if (dom.length == 1) dom = "0" + dom;
      return  dom + "/" + month + "/" + (date.getFullYear()+543);
  }
});
