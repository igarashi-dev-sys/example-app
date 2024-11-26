<x-app-layout>
    <body>
        <h1>Alpine.js 例</h1>

        <div x-data="fetchData()" class="p-4">
            <button @click="getData" class="bg-blue-500 text-white px-4 py-2 rounded" style="color:aqua;">Fetch Data</button>

            <table x-show="data.length > 0" class="table-auto border-collapse border border-gray-400 mt-4">
                <thead>
                    <tr>
                        <th class="border border-gray-400 px-4 py-2">ID</th>
                        <th class="border border-gray-400 px-4 py-2">Name</th>
                        <th class="border border-gray-400 px-4 py-2">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="item in data" :key="item.id">
                        <tr>
                            <td class="border border-gray-400 px-4 py-2" x-text="item.id"></td>
                            <td class="border border-gray-400 px-4 py-2" x-text="item.name"></td>
                            <td class="border border-gray-400 px-4 py-2" x-text="item.email"></td>
                        </tr>
                    </template>
                </tbody>
            </table>

            <!-- データがない場合のメッセージ -->
            <p x-show="data.length === 0 && !loading" class="mt-4 text-gray-500">No data available. Click the button to fetch data.</p>

            <!-- ローディング中のメッセージ -->
            <p x-show="loading" class="mt-4 text-blue-500">Loading...</p>
        </div>

        <script>
            function fetchData() {
                return {
                    data: [], // APIデータを格納
                    loading: false, // ローディング状態
                    async getData() {
                        this.loading = true;
                        try {
                            const response = await axios.get('/api/example'); // APIエンドポイント
                            this.data = response.data.data; // レスポンスからデータを取得
                        } catch (error) {
                            console.error('Error fetching data:', error);
                        } finally {
                            this.loading = false;
                        }
                    }
                };
            }
        </script>
    </body>
</x-app-layout>
