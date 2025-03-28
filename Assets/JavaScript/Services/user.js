export const toggleEnabledUser = async (id) => {
    const response = await fetch(`index.php?component=users&action=toggle_enabled&id=${id}`,{
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })

    return await response.json()
}