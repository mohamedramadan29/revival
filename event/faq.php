<?php
ob_start();
session_start();
$eventpage = 'event';
include 'init.php';
?>

<div class="cars hero faq">
    <div class="overlay">
        <div class="container data">
            <h2> اهم الاسئلة الشائعه </h2>
        </div>
    </div>
</div>
<!-- END HERO SECTION -->

<!-- START FAQ SECTION -->
<div class="faq_section">
    <div class="container">

        <div class="accordion">
            <div class="accordion-item">
                <a> لماذا رفايفال </a>
                <div class="content">
                    <p> ببساطة كوادر مميزة تتكون من نخبة من المواهب من مختلف الدول تعمل في تطوير مشروع ابداعي ومبتكر في
                        مختلف المجالات </p>
                </div>
            </div>
            <div class="accordion-item">
                <a> أهمية الخدمات التي نقدمها </a>
                <div class="content">
                    <p> أهمية خدماتنا تكمن في أنها رافدا أساسيا لتجديد الاستراتيجيات التنموية وتوفير وصول أفضل إلى
                        التنمية المستدامة من خلال الاقتصاد القائم على المعرفة حيث نطور مشاريع جديده ومبتكرة بمفهوم جديد
                        وابداعي للحكومات والمؤسسات والافراد تسهم في جذب المستمرين ودعم التنمية الاقتصادية.</p>
                </div>
            </div>
            <div class="accordion-item">
                <a> انضم الان </a>
                <div class="content">
                    <p> انظم الآن الى نخبة من محترفي تصميم وصناعة الأزياء والمجوهرات في العالم لتكون واحدا من أدوات نجاح
                        وتميز الملتقى العالمي "أدو للأزياء والموضة وفن الجسم والمجوهرات" الذي يعتبر منصّة متميزة تلتقي
                        فيها المواهب الناشئة بالنخب العالمية في مجال التصميم والأزياء وفن الجسم والمجوهرات والمصانع
                        والماركات العالمية والمشاهير، ومحبي الموضة والأزياء، </p>
                </div>
            </div>
        </div>


    </div>
</div>
<!-- END FAQ SECTION -->
<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>