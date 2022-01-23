<?php $corona = General::corona(); ?>
<div class="mb-4 pb-3 bg-light">
    <h4 class="font-italic brtop mybg">করোনা আপডেট (বিডি)-</h4>
    <div class="p-2 text-danger">
        <h5 class="text-left">নতুন আক্রান্ত - <?= Converter::times($corona['NewConfirmed']); ?> জন</h5>
        <h5 class="text-left">মোট আক্রান্ত - <?= Converter::times($corona['TotalConfirmed']); ?> জন</h5>
        <h5 class="text-left">মোট মৃত্যু - <?= Converter::times($corona['TotalDeaths']); ?> জন</h5>
        <h5 class="text-left">মোট সুস্থ - <?= Converter::times($corona['TotalRecovered']); ?> জন</h5>
    </div>
</div>