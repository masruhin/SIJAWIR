const formatRupiah = (num) => {
     let str = num.toString().replace("", ""),
          parts = false,
          output = [],
          i = 1,
          formatted = null;
     if (str.indexOf(".") > 0) {
          parts = str.split(".");
          str = parts[0];
     }
     str = str.split("").reverse();
     for (let j = 0, len = str.length; j < len; j++) {
          if (str[j] != ".") {
               output.push(str[j]);
               if (i % 3 == 0 && j < (len - 1)) {
                    output.push(".");
               }
               i++;
          }
     }
     formatted = output.reverse().join("");
     return ("Rp " + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""))
}

(function (window, undefined) {
     'use strict'
     /*
     NOTE:
     ------
     PLACE HERE YOUR OWN JAVASCRIPT CODE IF NEEDED
     WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR JAVASCRIPT CODE PLEASE CONSIDER WRITING YOUR SCRIPT HERE.  */

     

})(window)