<?
/** @var $this View */

$this->extend('/Common/template');
?>
<div class="row bg-white">
    <div class="col-md-12">
    <h1 class="page-header">
        <span class="glyphicon glyphicon-transfer color-primary"></span>
        KMI<span class="color-primary">.</span>TL - API
    </h1>
    <h4>API</h4>
    <ul>
        <li><a href="#Get">Get</a></li>
        <li><a href="#Info">Info</a></li>
    </ul>
    <h4>Example</h4>
    <ul>
        <li><a href="#Example_PHP">PHP</a></li>
        <li><a href="#Example_jQuery">PHP + jQuery (Ajax)</a></li>
    </ul>

    <h2 class="page-header">API</h2>

    <h3 id="Get">Get</h3>
    <p>
        การใช้บริการย่อ url ของ KMI.TL ผ่านทาง API นั้นทำได้โดยการร้องขอข้อมูลพร้อมกับส่ง url ที่ต้องการ
    </p>
    <p>
        <strong>ตัวอย่างการร้องขอเพื่อย่อ url (<a
                href="http://kmi.tl/api/get.json?url=http://www.kmitl.ac.th">ทดสอบ</a>)</strong>
    <div class="code">
        http://kmi.tl/api/get.json?url=<code>http://www.kmitl.ac.th</code>
    </div>
    </p>
    <p>
        ตัวอย่างข้างต้นแสดงการการร้องขอบริการย่อ url โดย url ที่ต้องการย่อคือ <code>http://kmitl.ac.th</code>
        คุณสามารถเปลี่ยนแปลงค่าของ <code>ตัวแปร url</code> ด้วย url ได้ตามต้องการ เช่น
    </p>
    <div class="code">
        http://kmi.tl/api/get.json?url=<code>http://google.com</code><br/>
        http://kmi.tl/api/get.json?url=<code>http://apple.com</code><br/>
        http://kmi.tl/api/get.json?url=<code>http://microsoft.com</code>
    </div>
    <p>
        หากผลการร้องขอสำเร็จคุณจะได้ผลตอบรับกลับมาเป็นข้อมูลในรูปแบบของ JSON
    </p>
    <p>
        <strong>ตัวอย่างผลการร้องขอเพื่อย่อ url (<a href="http://kmi.tl/api/get.json?url=http://www.kmitl.ac.th">ทดสอบ</a>)</strong>
    <div class="code">
        {<br/>
        &nbsp;&nbsp;&nbsp;&nbsp; url: "http://www.kmitl.ac.th", <span class="color-success">// Original url</span><br/>
        &nbsp;&nbsp;&nbsp;&nbsp; alias: "http://kmi.tl/scjwo4", <span
            class="color-success">// Alias (shorten url)</span><br/>
        &nbsp;&nbsp;&nbsp;&nbsp; info: "http://kmi.tl/scjwo4.info", <span
            class="color-success">// Information page</span><br/>
        &nbsp;&nbsp;&nbsp;&nbsp; qr: "http://kmi.tl/scjwo4.qr", <span class="color-success">// QRcode image</span><br/>
        &nbsp;&nbsp;&nbsp;&nbsp; counter: 0 <span class="color-success">// Access Counter</span><br/>
        }
    </div>
    </p>
    <p>
        <strong>
            ตัวอย่างผลการร้องขอเพื่อย่อ url <u>เมื่อเกิดข้อผลิดพลาด</u>
            (<a href="http://kmi.tl/api/get.json?url=kmitl.ac.th">ทดสอบ</a>)
        </strong>
    <div class="code">
        {<br/>
        &nbsp;&nbsp;&nbsp;&nbsp; error: true, <span class="color-success">// Error flag</span><br/>
        &nbsp;&nbsp;&nbsp;&nbsp; error_message: "invalid url", <span class="color-success">// Error Message</span><br/>
        &nbsp;&nbsp;&nbsp;&nbsp; url: "kmitl.ac.th" <span class="color-success">// Original url</span><br/>
        }
    </div>
    </p>

    <h3 id="Info">Info</h3>
    <p>
        ร้องขอข้อมูลของ url ที่เคยใช้บริการย่อจาก KMI.TL ไปแล้ว ผ่านทาง API นั้นทำได้โดยการร้องขอข้อมูลพร้อมกับส่ง url
        ที่ต้องการ โดย url นั้นสามารถเป็นได้ทั้ง url ที่ได้รับการย่อจาก KMI.TL หรือ url ดั้งเดิมก็ได้
    </p>
    <p>
        <strong>
            ตัวอย่างการร้องขอข้อมูลของ url ที่เคยใช้บริการย่อจาก KMI.TL
            (<a href="http://kmi.tl/api/info.json?url=http://www.kmitl.ac.th">ทดสอบ</a>)
        </strong>
    <div class="code">
        http://kmi.tl/api/info.json?url=<code>http://kmi.tl/scjwo4</code> <span
            class="color-success">// KMI.TL url</span><br/>
        http://kmi.tl/api/info.json?url=<code>http://www.kmitl.ac.th</code> <span
            class="color-success">// Original url</span><br/>
    </div>
    </p>
    <p>
        หากผลการร้องขอสำเร็จคุณจะได้ผลตอบรับกลับมาเป็นข้อมูลในรูปแบบของ JSON
    </p>
    <p>
        <strong>
            ตัวอย่างผลการร้องขอข้อมูลของ url ที่เคยใช้บริการย่อจาก KMI.TL
            (<a href="http://kmi.tl/api/get.json?url=http://www.kmitl.ac.th">ทดสอบ</a>)
        </strong>
    <div class="code">
        {<br/>
        &nbsp;&nbsp;&nbsp;&nbsp; url: "http://www.kmitl.ac.th", <span class="color-success">// Original url</span><br/>
        &nbsp;&nbsp;&nbsp;&nbsp; alias: "http://kmi.tl/scjwo4", <span
            class="color-success">// Alias (shorten url)</span><br/>
        &nbsp;&nbsp;&nbsp;&nbsp; info: "http://kmi.tl/scjwo4.info", <span
            class="color-success">// Information page</span><br/>
        &nbsp;&nbsp;&nbsp;&nbsp; qr: "http://kmi.tl/scjwo4.qr", <span class="color-success">// QRcode image</span><br/>
        &nbsp;&nbsp;&nbsp;&nbsp; counter: 50 <span class="color-success">// Access counter</span><br/>
        }
    </div>
    </p>
    <p>
        <strong>
            ตัวอย่างผลการร้องขอข้อมูลของ url ที่เคยใช้บริการย่อจาก KMI.TL <u>เมื่อเกิดข้อผลิดพลาด</u>
            (<a href="http://kmi.tl/api/get.json?url=kmitl.ac.th">ทดสอบ</a>)
        </strong>
    <div class="code">
        {<br/>
        &nbsp;&nbsp;&nbsp;&nbsp; error: true, <span class="color-success">// Error flag</span><br/>
        &nbsp;&nbsp;&nbsp;&nbsp; error_message: "invalid url or url not found", <span
            class="color-success">// Error Message</span><br/>
        &nbsp;&nbsp;&nbsp;&nbsp; url: "kmitl.ac.th" <span class="color-success">// Original url</span><br/>
        }
    </div>
    </p>

    <h2 class="page-header">Example</h2>

    <h3 id="Example_PHP">PHP</h3>
    <p>
        เนื่องจาก API ของ KMI.TL นั้นสามารถเรียกใช้ได้ผ่านทาง url โดยตรง ทำให้สามารถเรียกใช้งานได้อย่างสะดวก
    </p>
    <p>
        <strong>ตัวอย่างการเรียกใช้ API ของ KMI.TL ด้วยภาษา PHP</strong>
    <div class="code">
        <?=h('<?php')?><br/>
        $url = "http://www.kmitl.ac.th";
        <br/>
        $response = file_get_contents(<code>"http://kmi.tl/api/get.json?url={$url}"</code>); <span class="color-success">// Request to KMI.TL API</span>
        <br/>
        $response = json_decode($response, true); <span class="color-success">// Parse JSON to Array</span>
        <br/>
        var_dump($response); <br/>
    <span class="color-success">
    /*<br/>
    Array(<br/>
     &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; [url] => "http://www.kmitl.ac.th",<br/>
     &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; [alias] => "http://kmi.tl/scjwo4",<br/>
     &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; [info] => "http://kmi.tl/scjwo4.info",<br/>
     &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; [qr] => "http://kmi.tl/scjwo4.qr",<br/>
     &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; [counter] => 50<br/>
    )<br/>
    */<br/>
    </span>
        <?=h('?>')?>
    </div>
    </p>
    <p>
        <strong>ตัวอย่างการเรียกใช้ API ของ KMI.TL ด้วยภาษา PHP แบบเป็น Function</strong>
    <div class="code">
        <?=h('<?php')?><br/>
        function kmitlGetUrl ($url) {
        <br/>
        &nbsp;&nbsp;&nbsp;&nbsp; $response = file_get_contents(<code>"http://kmi.tl/api/get.json?url={$url}"</code>); <span
            class="color-success">// Request to KMI.TL API</span>
        <br/>
        &nbsp;&nbsp;&nbsp;&nbsp; return json_decode($response, true); <span
            class="color-success">// Parse JSON to Array</span>
        <br/>
        }
        <br/><br/>
        function kmitlGetInfo ($url) {
        <br/>
        &nbsp;&nbsp;&nbsp;&nbsp; $response = file_get_contents(<code>"http://kmi.tl/api/info.json?url={$url}"</code>); <span
            class="color-success">// Request to KMI.TL API</span>
        <br/>
        &nbsp;&nbsp;&nbsp;&nbsp; return json_decode($response, true); <span
            class="color-success">// Parse JSON to Array</span>
        <br/>
        }
        <br/><br/>
        $url = "http://www.kmitl.ac.th";<br/>
        $info = kmitlGetUrl($url); <span class="color-success">// Call get url info function</span>
        <br/>
        var_dump($info); <br/>
    <span class="color-success">
    /*<br/>
    Array(<br/>
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; [url] => "http://www.kmitl.ac.th",<br/>
     &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; [alias] => "http://kmi.tl/scjwo4",<br/>
     &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; [info] => "http://kmi.tl/scjwo4.info",<br/>
     &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; [qr] => "http://kmi.tl/scjwo4.qr",<br/>
     &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; [counter] => 50<br/>
    )<br/>
    */</span>
        <br/><br/>
        $info = kmitlGetInfo($url); <span class="color-success">// Call get url function</span>
        <br/>
        var_dump($info); <br/>
    <span class="color-success">
    /*<br/>
    Array(<br/>
     &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; [url] => "http://www.kmitl.ac.th",<br/>
     &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; [alias] => "http://kmi.tl/scjwo4",<br/>
     &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; [info] => "http://kmi.tl/scjwo4.info",<br/>
     &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; [qr] => "http://kmi.tl/scjwo4.qr",<br/>
     &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; [counter] => 50<br/>
    )<br/>
    */<br/>
    </span>
        <?=h('?>')?>
    </div>
    </p>

    <h3 id="Example_jQuery">PHP + jQuery (Ajax)</h3>
    <p>
        การใช้ jQuery เพื่อร้องขอ API ของ KMI.TL ผ่าน Ajax โดยตรงนั้นไม่สามารถทำได้เนื่องจากผิดข้อบังคับ (Policy)
        ของการร้องขอผ่าน Ajax ที่ไม่อนุญาติให้มีการร้องขอแบบ JSON ข้าม Domain (Cross Domain)
        ดังนั้นหากต้องการร้องขอมาผ่านทาง Ajax แล้ว จำเป็นต้องมีไฟล์ PHP สำหรับทำงานเหมือน proxy (ตัวแทน) ในการร้องขอข้อมูล
        ในที่นี้เราจะให้ไฟล์ PHP ที่ทำหน้าที่เป็น Proxy มีชื่อว่า
        <code>proxyForKMI.TL.php</code> และ ไฟล์ Javascript สำหรับร้องขอผ่านมายังไฟล์นี้ว่า <code>jQueryForKMI.TL.js</code>
        โดยทั้งสองไฟล์นี้จะอยู่ในโฟลเดอร์เดียวกัน
    </p>
    <p>
        ในขั้นตอนของการทำงานนั้น <code>jQueryForKMI.TL.js</code> จะร้องขอข้อมูลแบบ Ajax ไปยัง
        <code>proxyForKMI.TL.php</code> จากนั้น <code>proxyForKMI.TL.php</code>
        จะทำการส่งค่าการร้องขอไปยัง KMI.TL API ซึ่งหลังจากที่ <code>proxyForKMI.TL.php</code> ได้รับค่าตอบกลับจาก KMI.TL API
        แล้ว ก็จะทำการส่งค่าที่ได้กลับไปยัง <code>jQueryForKMI.TL.js</code> และสิ้นสุดการทำงาน
    </p>
    <p>
        <strong>ไฟล์ jQueryForKMI.TL.js</strong>
    <div class="code">
        jQuery(function($){ <br/>
        &nbsp;&nbsp;&nbsp;&nbsp; var url = 'http://www.kmitl.ac.th'; <br/>
        &nbsp;&nbsp;&nbsp;&nbsp; $.get( <br/>
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; 'proxyForKMI.TL.php',<br/>
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; { url: <code>'http://kmi.tl/api/get.json?url=' + url</code>}, <br/>
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; function(response){ <br/>
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; alert(JSON.stringify(response)); <span class="color-success">// convert JSON to string, just for display result.</span><br/>
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; }, <br/>
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; 'json' <br/>
        &nbsp;&nbsp;&nbsp;&nbsp; ); <br/>
        });
    </div>
    </p>
    <p>
        <strong>ไฟล์ proxyForKMI.TL.php</strong>
    <div class="code">
        <?=h('<?php')?><br/>
        echo file_get_contents(<code>$_GET['url']</code>); <span class="color-success">// Request to KMI.TL API</span><br/>
        <?=h('?>')?>
    </div>
    </p>

    <hr/>
    </div>
</div>
