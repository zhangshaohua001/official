
			window.onload = function() {
				var oDiv1 = document.getElementById('er');
				var oDiv2 = document.getElementById('er_icon');
				var timer = null; //定义定时器变量
				//鼠标移入div1或div2都把定时器关闭了，不让他消失
				oDiv1.onmouseover = oDiv2.onmouseover = function() {
						oDiv2.style.display = 'block';
						clearTimeout(timer);
					}
					//鼠标移出div1或div2都重新开定时器，让他延时消失
				oDiv1.onmouseout = oDiv2.onmouseout = function() {
					//开定时器
					timer = setTimeout(function() {
						oDiv2.style.display = 'none';
					}, 500);
				}
			}
