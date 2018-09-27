### 概述
所有设置了 position 属性且值不为 static 的元素 ，都会以 left、right、top、bottom 属性的值 ，根据自己的相对元素进行偏移

---

### relative
[ 相对元素 ]  
1. 当一个元素的 position 设为 relative 后 ，该元素的相对元素是其元素本身

---

### absolute
[ 特性 ]
1. 当 position 设为 absolute ，元素会脱离文档流 ，不占据原本空间  
2. 元素将转为块元素  

[ 相对元素 ]  
1. 当元素的祖先元素也设置了 position 属性 ，且属性值为 absolute 或 relative 时 ，该元素的相对元素是其祖先元素 ，否则是 body 元素

---

### fixed
[ 特性 ]  
1. 当 position 设为 fixed ，元素会脱离文档流 ，不占据原本空间

[ 相对元素 ]
1. fixed 总是以 body 元素为相对元素

---