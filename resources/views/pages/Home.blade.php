
<x-layout>
    <x-slot name="title">Cards, for everyone in everywhere</x-slot>

    <section class="mt-4">
        <div class="trends-up bg-slate-900 flex justify-items-center p-4 justify-between m-4">
            <h3 class="text-xl">🔝Trends</h3>
            <x-button-link url="/cards" >View all cards</x-button-link>
        </div>
        <div class="boxes flex flex-wrap items-center gap-4 justify-center">
            <x-box-cards  title="Best Sellers" />
            <x-box-cards title="Best Bargains!" />
        </div>
    </section>
</x-layout>
