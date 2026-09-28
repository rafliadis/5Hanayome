{{-- Top Bar TBS Official Style --}}
<div class="bg-slate-950 text-slate-300 text-xs border-b border-white/10 px-4 sm:px-6 py-1.5 flex items-center justify-between select-none">
    {{-- Pojok Kiri: Logo/Teks TBS Portal --}}
    <div class="flex items-center gap-2.5">
        <span class="inline-flex items-center justify-center bg-white text-slate-950 font-black px-2 py-0.5 rounded text-[10px] tracking-wider shadow-sm">
            TBS
        </span>
        <span class="text-white/20">/</span>
        <span data-i18n="topbar.portal" class="text-slate-300 font-medium text-[11px] hidden sm:inline">
            TBSテレビ アニメ公式ポータル
        </span>
    </div>

    {{-- Pojok Kanan: Status Siaran & Tagline --}}
    <div class="flex items-center gap-3 text-[11px]">
        <div class="flex items-center gap-1.5 bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 px-2 py-0.5 rounded-full text-[10px] font-semibold">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-ping"></span>
            <span data-i18n="topbar.broadcast">TBS・BS11ほかにて放送中</span>
        </div>
        <span class="hidden md:inline text-white/30">|</span>
        <span data-i18n="topbar.subtitle" class="hidden md:inline text-pink-300/80 font-medium">TVアニメ「五等分の花嫁」公式ポータル</span>
    </div>
</div>
