<div class="modal fade" id="TreeDetail{{$user}}" tabindex="-1" aria-labelledby="TreeDetail{{$user}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody class="text-start">
                        <tr>
                            <td>Active Investment</td>
                            <td class="text-end">${{ number_format(getActivePlan($user),2) }}</td>
                        </tr>
                        <tr>
                            <td>Total Business Volume</td>
                            <td class="text-end">${{ number_format(myLeftBusiessVolume($user),2) }}</td>
                        </tr>
                        <tr>
                            <td>Total Referrals</td>
                            <td class="text-end">{{ myReferrals($user) }}</td>
                        </tr>
                        <tr>
                            <td>Total Left Team</td>
                            <td class="text-end">{{ leftReferrals($user) }}</td>
                        </tr>
                        <tr>
                            <td>Total Right Team</td>
                            <td class="text-end">{{ rightReferrals($user) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>